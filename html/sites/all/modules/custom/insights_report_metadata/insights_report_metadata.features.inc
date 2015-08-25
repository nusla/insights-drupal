<?php
/**
 * @file
 * insights_report_metadata.features.inc
 */

/**
 * Implements hook_views_api().
 */
function insights_report_metadata_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function insights_report_metadata_node_info() {
  $items = array(
    'column' => array(
      'name' => t('Column'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'database' => array(
      'name' => t('Database'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
