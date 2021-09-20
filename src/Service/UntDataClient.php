<?php

namespace Drupal\unt_datapoints\Service;

use Drupal\Component\Serialization\Json;

/**
 * Class UntDataClient.
 */
class UntDataClient {
  /**
   * @var \GuzzleHttp\Client
   */

  protected $client;

  /**
   * UntAlertsClient constructor
   * @param $http_client_factory \Drupal\Core\Http\ClientFactory
   */

  /**
   * Constructs a new UntDataClient object.
   */
  public function __construct(\Drupal\Core\Http\ClientFactory $http_client_factory) {
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'http://data.d9.loc'
    ]);
  }

  /**
   * Show the alert in the alerts region
   *
   * @param int $org Name of the organization/department to retrieve statistics for.
   *
   * @return array
   */
  public function getData($org = 'UNT'){
    $response = $this->client->get('api/datapoints', [
      'query' => [
        'org' => $org,
        '_format' => 'json',
      ],
    ]);
    return Json::decode($response->getBody());
  }

}
