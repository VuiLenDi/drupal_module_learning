<?php
$config = \Drupal::service('config.factory')->getEditable('hello_world.settings');
// Set and save new message value.
$config->set('message', 'Hi')->save();
// Now will print 'Hi'.
print $config->get('message');
