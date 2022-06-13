<?php

namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Salutation\Salutation;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the salutation message.
 */
class HelloWorldController extends ControllerBase {

  /**
   * Salutation text.
   *
   * @var \Drupal\hello_world\Salutation
   */
  protected $salutation;

  /**
   * Salutation controller constructor.
   *
   * @param \Drupal\hello_world\Salutation $salutation
   *   Salutation text.
   */
  public function __construct(Salutation $salutation) {
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('Salutation.salutation')
    );
  }

  /**
   * Salutation.
   *
   * @return array
   *   Our message.
   */
  public function salutation() {

    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }

}
