<?php

namespace Drupal\countrystateapi\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\State\StateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CountryStateForm extends FormBase {

  const CountryStateAPIConfig = 'countrystateapi.config';

  /**
   * Drupal\Core\State\StateInterface definition.
   *
   * @var StateInterface
   */
  protected $_state;
  /**
   * @var MessengerInterface
   */
  protected $_messenger;

  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->_state = $container->get('state');
    $instance->_messenger = $container->get('messenger');
    return $instance;
  }

  /**
   * @return \Drupal\Core\State\StateInterface
   */
  public function getState()
  {
    return $this->_state;
  }

  /**
   * @param $state
   */
  public function setState($state)
  {
    $this->_state = $state;
  }

  /**
   * @return MessengerInterface
   */
  public function getMessenger()
  {
    return $this->_messenger;
  }

  /**
   * @param MessengerInterface $messenger
   */
  public function setMessenger($messenger)
  {
    $this->_messenger = $messenger;
  }

  /**
   * @return string
   */
  public function getFormId()
  {
    return 'countrystateapi.settings_form';
  }

  /**
   * @return mixed
   */
  public function getSettingsData() {
    return \Drupal::state()->get(self::CountryStateAPIConfig);
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return void
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $settings = self::getSettingsData();
    $form['#tree'] = TRUE;
    $form['header'] = [
      '#type' => 'details',
      '#title' => $this->t('Top-nav'),
      '#open' => TRUE,
    ];
    $form['header']['country_state_api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Country State API Key'),
      '#default_value' => $settings['header']['country_state_api_key'] ?? '',
      '#required' => FALSE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return void
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $values = $form_state->getValues();
    $config = [
      'header' => '',
    ];
    $data = array_intersect_key($values, $config);
    $this->getState()->set(self::CountryStateAPIConfig, $data);

    $this->getMessenger()->addMessage('Settings are properly saved');
  }


}
