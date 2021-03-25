<?php
namespace Drupal\hello_world\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloWorldController extends ControllerBase
{
  /**
   * Returns a render-able array for a test page
   */
  public function content() {
    $config = \Drupal::config('hello_world.settings');
    // Will print 'Hello'.
    //var_dump($config->get('message'));
    // Will print 'en'.
    //var_dump($config->get('langcode'));
    $test = $config->get('message');

    $build = [
      '#markup' => 'Hello World!' . $test,
    ];
    return $build;
  }

  public function twigTemplate() {
    // We can set value to template
    $myText = 'Hello!! How are you';
    $myNumber = 33;
    $myArray = [7, 8, 'hehe'];
    return [
      '#theme' => 'hello_world_theme_hook',
      '#variable1' => $myText,
      '#variable2' => $myNumber,
      '#variable3' => $myArray,
    ];
  }
}
