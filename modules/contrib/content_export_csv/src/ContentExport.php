<?php

namespace Drupal\content_export_csv;

use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\Entity\Node;

/**
 * Content export service class.
 */
class ContentExport {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The entity field manager.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;

  /**
   * The constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Entity\EntityFieldManagerInterface $entity_field_manager
   *   The entity field manager.
   */
  public function __construct(
    EntityTypeManagerInterface $entity_type_manager,
    EntityFieldManagerInterface $entity_field_manager
  ) {
    $this->entityTypeManager = $entity_type_manager;
    $this->entityFieldManager = $entity_field_manager;
  }

  /**
   * Get available content types.
   *
   * @return array
   *   Returns an array of content types.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function getContentTypes(): array {
    $contentTypes = $this->entityTypeManager->getStorage('node_type')->loadMultiple();
    $contentTypesList = [];
    foreach ($contentTypes as $contentType) {
      $contentTypesList[$contentType->id()] = $contentType->label();
    }
    return $contentTypesList;
  }

  /**
   * Get nids based on node type.
   *
   * @param string $nodeType
   *   The node type.
   * @param int $status
   *   The status flag. 0 => unpublished, 1 => published.
   *
   * @return array|int
   *   Returns an array of nids.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function getNodeIds(string $nodeType, int $status = 1) {
    $entityQuery = $this->entityTypeManager->getStorage('node')->getQuery();
    $entityQuery->condition('status', $status);
    $entityQuery->condition('type', $nodeType);
    return $entityQuery->execute();
  }

  /**
   * Collects Node Data.
   *
   * @param array $entityIds
   *   The node ids.
   * @param array $fields
   *   The array of fields to use in export. If empty, all will be exported.
   *
   * @return array
   *   Returns the array of node data.
   */
  public function getNodeDataList(array $entityIds, array $fields = []): array {
    $nodeData = Node::loadMultiple($entityIds);
    $nodeCsvData = [];
    foreach ($nodeData as $nodeDataEach) {
      $nodeCsvData[] = implode(',', $this->getNodeData($nodeDataEach, $fields));
    }
    return $nodeCsvData;
  }

  /**
   * Gets the valid field list.
   *
   * @param string $nodeType
   *   The node type.
   *
   * @return array
   *   Returns array of fields.
   */
  public function getValidFieldList(string $nodeType): array {
    $nodeArticleFields = $this->entityFieldManager->getFieldDefinitions('node', $nodeType);
    $nodeFields = array_keys($nodeArticleFields);
    $unwantedFields = [
      'comment',
      'sticky',
      'revision_default',
      'revision_translation_affected',
      'revision_timestamp',
      'revision_uid',
      'revision_log',
      'vid',
      'uuid',
      'promote',
    ];

    foreach ($unwantedFields as $unwantedField) {
      $unwantedFieldKey = array_search($unwantedField, $nodeFields);
      unset($nodeFields[$unwantedFieldKey]);
    }

    return $nodeFields;
  }

  /**
   * Gets Manipulated Node Data.
   *
   * @param \Drupal\node\Entity\Node $node
   *   The node object.
   * @param array $fields
   *   The array of fields to use in export. If empty, all will be exported.
   *
   * @return array
   *   Returns an array of node data.
   */
  public function getNodeData(Node $node, array $fields = []): array {
    $nodeData = [];

    if (empty($fields)) {
      $nodeFields = $this->getValidFieldList($node->bundle());
    }
    else {
      $nodeFields = $fields;
    }

    foreach ($nodeFields as $nodeField) {
      $nodeData[] = (isset($node->{$nodeField}->value)) ? '"' . htmlspecialchars(strip_tags($node->{$nodeField}->value)) . '"' : ((isset($node->{$nodeField}->target_id)) ? '"' . htmlspecialchars(strip_tags($node->{$nodeField}->target_id)) . '"' : '"' . htmlspecialchars(strip_tags($node->{$nodeField}->langcode)) . '"');
    }

    return $nodeData;
  }

  /**
   * Get Node Data in CSV Format.
   *
   * @param string $nodeType
   *   The node type.
   * @param int $status
   *   The status flag. 0 => unpublished, 1 => published.
   * @param array $fields
   *   The array of fields to use in export. If empty, all will be exported.
   *
   * @return array
   *   Returns an array of csv data.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function getNodeCsvData(string $nodeType, int $status = 1, array $fields = []): array {
    $entityIds = $this->getNodeIds($nodeType, $status);
    return $this->getNodeDataList($entityIds, $fields);
  }

}
