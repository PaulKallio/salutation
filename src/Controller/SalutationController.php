<?php

namespace Drupal\salutation\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\salutation\Salutation;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the salutation message.
 */
class SalutationController extends ControllerBase {

  /**
   * Salutation text.
   *
   * @var \Drupal\salutation\SalutationSalutaion
   */
  protected $salutation;

  /**
   * Salutation controller constructor.
   *
   * @param \Drupal\salutation\Salutation $salutation
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
      $container->get('salutation.salutation')
    );
  }

  /**
   * Salutation.
   *
   * @return array
   *   Our message.
   */
  public function Salutation() {

    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }

}
