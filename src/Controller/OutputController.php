<?php

namespace Drupal\site_api_key\Controller;

/**
 * @file
 * Contains \Drupal\site_api_key\Controller\OutputController.
 */

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class OutputController.
 *
 * @package Drupal\site_api_key\Controller
 */
class OutputController extends ControllerBase {

  /**
   * The Serializer.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   *   Serializer Dependency will be stored inside this.
   */
  protected $serializer;

  /**
   * NodeSerializer constructor.
   *
   * @param \Symfony\Component\Serializer\SerializerInterface $serializerInterface
   *   Dependency.
   */
  public function __construct(SerializerInterface $serializerInterface) {
    // Store the serializer instance inside the current Class Object.
    $this->serializer = $serializerInterface;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Loading the service 'serializer'(defined by serialization module) in the
    // Container.
    return new static(
      $container->get('serializer')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function page_node_json(NodeInterface $node) {

    // We are using serialize function of serializer Object.
    // Step 1: Converts the Node Object into an Normalized Array.
    // Step 2: Converts The Normalized Array into Json Format(Our Case).
    $serialized_node = $this->serializer->serialize($node, 'json');
    // Build Output.
    $build = [
      '#type' => 'markup',
      '#markup' => $serialized_node,
    ];
    
    // Return the json markup.
    return $build;
  } // end of function page_node_json

} // end of class OutputController
