<?php

namespace Drupal\hello_world\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'mycustomfields' field type.
 *
 * @FieldType(
 *   id = "mycustomfields_code",
 *   label = @Translation("mycustomfields field"),
 *   description = @Translation("This field stores code mycustomfields in the database."),
 *   default_widget = "mycustomfields_default",
 *   default_formatter = "mycustomfields_default"
 * )
 */
class MyCustomFieldsItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  static $propertyDefinitions;

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('source_code')->getValue();
    return $value === NULL || $value === '';
  }

  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
  {
    $properties['source_description'] = DataDefinition::create('string')
      ->setLabel(t('Snippet description'));

    $properties['source_code'] = DataDefinition::create('string')
      ->setLabel(t('Snippet code'));

    $properties['source_lang'] = DataDefinition::create('string')
      ->setLabel(t('Programming Language'))
      ->setDescription(t('Snippet code language'));

    return $properties;
  }

  public static function schema(FieldStorageDefinitionInterface $field_definition)
  {
    return array(
      'columns' => array(
        'source_description' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
        'source_code' => array(
          'type' => 'text',
          'size' => 'big',
          'not null' => FALSE,
        ),
        'source_lang' => array(
          'type' => 'varchar',
          'length' => 256,
          'not null' => FALSE,
        ),
      ),
    );
  }
}
