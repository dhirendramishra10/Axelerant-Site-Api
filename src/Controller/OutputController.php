<?php

namespace Drupal\site_api_key\Controller;

/**
 * @file
 * Contains \Drupal\site_api_key\Controller\OutputController.
 */

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * OutputController for the site_api_key module.
 */
class OutputController extends ControllerBase {

  /**
   * Function to render JSON output for page node type.
   *
   * @param $site_api_key
   *   A String passed from the request URL
   *
   * @param $nid
   *   A integer passed from the request URL
   *
   * @return JsonResponse
   *
   * A Json Response containing Node info or Error Message
   *
   */
  public function page_node_json($site_api_key, NodeInterface $node) {
    $json_res = array();

    // Get the Site API Key from configuration
    $api_key = $this->config('site_api.settings')->get('siteapikey');

    // Check if the API Key entered in the URL is Valid
    if ($site_api_key === $api_key) {
      // Respond with the json representation of the node
      return new JsonResponse($node->toArray(), 200, ['Content-Type'=> 'application/json']);
    }
    else {
      echo t('Invalid Site Api Key.');
      die();
    }
  } // end of function page_node_json

} // end of class OutputController
