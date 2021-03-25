<?php
namespace Drupal\hello_world\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'mycustomfields_default' formatter.
 *
 * @FieldFormatter(
 *   id = "mycustomfields_default",
 *   label = @Translation("mycustomfields default"),
 *   field_types = {
 *     "mycustomfields_code"
 *   }
 * )
 */
class MyCustomFieldsDefaultFormatter extends FormatterBase {
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = array();
    foreach ($items as $delta => $item) {
      // Render output using mycustomfields_default theme.
      $source = array(
        '#theme' => 'my_custom_field_default',
        '#source_description' => $item->source_description,
        '#source_code' => $item->source_code,
      );

      $elements[$delta] = array('#markup' => \Drupal::service('renderer')->render($source));
    }

    return $elements;
  }
}
