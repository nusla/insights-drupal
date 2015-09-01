<?php
/**
 * @file
 * insights_report_metadata.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function insights_report_metadata_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'insgights_metadata';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Insgights Metadata';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Insgights Metadata';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    4 => '4',
  );
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '50';
  $handler->display->display_options['style_plugin'] = 'table';
  /* Field: Content: Table */
  $handler->display->display_options['fields']['field_table']['id'] = 'field_table';
  $handler->display->display_options['fields']['field_table']['table'] = 'field_data_field_table';
  $handler->display->display_options['fields']['field_table']['field'] = 'field_table';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'column' => 'column',
  );

  /* Display: Columns */
  $handler = $view->new_display('page', 'Columns', 'page');
  $handler->display->display_options['defaults']['title'] = FALSE;
  $handler->display->display_options['title'] = 'Insights Metadata';
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'editableviews_table';
  $handler->display->display_options['style_options']['columns'] = array(
    'nid' => 'nid',
    'field_column' => 'field_column',
    'title_editable' => 'title_editable',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'nid' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_column' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'title_editable' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  $handler->display->display_options['style_options']['save_messages'] = 'none';
  $handler->display->display_options['style_options']['batch_size'] = '10';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['header'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Nid */
  $handler->display->display_options['fields']['nid']['id'] = 'nid';
  $handler->display->display_options['fields']['nid']['table'] = 'node';
  $handler->display->display_options['fields']['nid']['field'] = 'nid';
  $handler->display->display_options['fields']['nid']['exclude'] = TRUE;
  /* Field: Content: Database Column Name */
  $handler->display->display_options['fields']['field_column']['id'] = 'field_column';
  $handler->display->display_options['fields']['field_column']['table'] = 'field_data_field_column';
  $handler->display->display_options['fields']['field_column']['field'] = 'field_column';
  $handler->display->display_options['fields']['field_column']['label'] = '';
  $handler->display->display_options['fields']['field_column']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_column']['alter']['path'] = 'node/[nid]/edit';
  $handler->display->display_options['fields']['field_column']['element_label_colon'] = FALSE;
  /* Field: Content: Title (editable) */
  $handler->display->display_options['fields']['title_editable']['id'] = 'title_editable';
  $handler->display->display_options['fields']['title_editable']['table'] = 'node';
  $handler->display->display_options['fields']['title_editable']['field'] = 'title_editable';
  $handler->display->display_options['fields']['title_editable']['label'] = '';
  $handler->display->display_options['fields']['title_editable']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title_editable']['link_to_node'] = FALSE;
  $handler->display->display_options['fields']['title_editable']['textfield_size'] = '30';
  /* Field: Content: Active (editable) */
  $handler->display->display_options['fields']['field_active_editable']['id'] = 'field_active_editable';
  $handler->display->display_options['fields']['field_active_editable']['table'] = 'field_data_field_active';
  $handler->display->display_options['fields']['field_active_editable']['field'] = 'field_active_editable';
  $handler->display->display_options['fields']['field_active_editable']['label'] = '';
  $handler->display->display_options['fields']['field_active_editable']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_active_editable']['widget_type'] = 'options_onoff';
  $handler->display->display_options['fields']['field_active_editable']['suppress_label'] = 1;
  $handler->display->display_options['fields']['field_active_editable']['suppress_description'] = 0;
  $handler->display->display_options['defaults']['sorts'] = FALSE;
  /* Sort criterion: Content: Database Column Name (field_column) */
  $handler->display->display_options['sorts']['field_column_value']['id'] = 'field_column_value';
  $handler->display->display_options['sorts']['field_column_value']['table'] = 'field_data_field_column';
  $handler->display->display_options['sorts']['field_column_value']['field'] = 'field_column_value';
  /* Sort criterion: Content: Active (field_active) */
  $handler->display->display_options['sorts']['field_active_value']['id'] = 'field_active_value';
  $handler->display->display_options['sorts']['field_active_value']['table'] = 'field_data_field_active';
  $handler->display->display_options['sorts']['field_active_value']['field'] = 'field_active_value';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Content: Table (field_table) */
  $handler->display->display_options['arguments']['field_table_value']['id'] = 'field_table_value';
  $handler->display->display_options['arguments']['field_table_value']['table'] = 'field_data_field_table';
  $handler->display->display_options['arguments']['field_table_value']['field'] = 'field_table_value';
  $handler->display->display_options['arguments']['field_table_value']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_table_value']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_table_value']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_table_value']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['field_table_value']['limit'] = '0';
  $handler->display->display_options['path'] = 'insgights-metadata/columns/%';

  /* Display: Tables */
  $handler = $view->new_display('page', 'Tables', 'page_1');
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['group_by'] = FALSE;
  $handler->display->display_options['group_by'] = TRUE;
  $handler->display->display_options['defaults']['header'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: Content: Table */
  $handler->display->display_options['fields']['field_table']['id'] = 'field_table';
  $handler->display->display_options['fields']['field_table']['table'] = 'field_data_field_table';
  $handler->display->display_options['fields']['field_table']['field'] = 'field_table';
  $handler->display->display_options['fields']['field_table']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_table']['alter']['path'] = 'insgights-metadata/columns/[field_table]';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['group_type'] = 'count_distinct';
  $handler->display->display_options['path'] = 'insgights-metadata/tables';
  $export['insgights_metadata'] = $view;

  return $export;
}
