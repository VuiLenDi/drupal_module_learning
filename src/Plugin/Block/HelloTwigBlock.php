<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'HelloTwig' Block.
 *
 * @Block(
 *   id = "hello_twig_block",
 *   admin_label = @Translation("Hello twig block"),
 *   category = @Translation("Hello World"),
 * )
 */
class HelloTwigBlock extends BlockBase {
  public function build()
  {
    return [
      '#theme' => 'hello_world_twig_block_hook'
    ];
  }
}
