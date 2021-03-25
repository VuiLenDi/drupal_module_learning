<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 *   category = @Translation("Hello World"),
 * )
 */
class HelloBlock extends BlockBase {
  public function build()
  {
    /* return [
      '#markup' => $this->t('Hello, WORLD!!!!'),
    ]; */

    $config = $this->getConfiguration();

    if (!empty($config['hello_block_name'])) {
      $name = $config['hello_block_name'];
    }
    else {
      $name = $this->t('to no one');
    }

    return [
      '#markup' => $this->t('Hello @name!', [
        '@name' => $name,
      ]),
    ];
  }

  public function blockForm($form, FormStateInterface $form_state)
  {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['hello_block_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => isset($config['hello_block_name']) ?
        $config['hello_block_name'] : '',
    ];

    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state)
  {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['hello_block_name'] = $values['hello_block_name'];
    // If you have a fieldset wrapper around your form elements
    // then you should pass an array
    /*
     * $this->configuration['hello_block_name'] =
     *  $form_state->getValue(['myfieldset', 'hello_block_name']);
     */
  }

  public function blockValidate($form, FormStateInterface $form_state) {
    if($form_state->getValue('hello_block_name') === 'John'){
      $form_state->setErrorByName('hello_block_name',
        $this->t('You can not say hello to John.'));
    }
  }

}
