<?php

namespace Drupal\countrystateapi\Services;

use Drupal\countrystateapi\Form\CountryStateForm;

class CountryStateService {
  /**
   * @return mixed
   */
  private function getCountrySettings() {
    return \Drupal::state()->get(CountryStateForm::CountryStateAPIConfig);
  }

  /**
   * @return mixed
   */
  private function getApiKey() {
    $settings = $this->getCountrySettings();
    return $settings['header']['country_state_api_key'];
  }

  /**
   * @param $iso
   * @return void
   */
  public function getCountryInfo($iso) {
    if (!empty($this->getApiKey())) {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries/'.$iso,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          'X-CSCAPI-KEY: ' . $this->getApiKey()
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      return json_decode($response);
    }
    return [];
  }

  /**
   * @return array|mixed
   */
  public function getCountries() {
    if (!empty($this->getApiKey())) {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          'X-CSCAPI-KEY: ' . $this->getApiKey()
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      return json_decode($response);
    }
    return [];
  }

  /**
   * @return array|mixed
   */
  public function getCountriesFormat() {
    if (!empty($this->getApiKey())) {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
          'X-CSCAPI-KEY: ' . $this->getApiKey()
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      $values = json_decode($response);
      $result = [];
      foreach ($values as $value) {
        $result[$value->name] = $value;
      }
      return $result;
    }
    return [];
  }
}
