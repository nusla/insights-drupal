<?php
/**
 * @file
 * actuos_features.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function actuos_features_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: features.
  $menus['features'] = array(
    'menu_name' => 'features',
    'title' => 'Features',
    'description' => 'Menu items for any enabled features.',
  );
  // Exported menu: main-menu.
  $menus['main-menu'] = array(
    'menu_name' => 'main-menu',
    'title' => 'Main menu',
    'description' => 'The <em>Main</em> menu is used on many sites to show the major sections of the site, often in a top navigation bar.',
  );
  // Exported menu: menu-system-menu.
  $menus['menu-system-menu'] = array(
    'menu_name' => 'menu-system-menu',
    'title' => 'System Menu',
    'description' => '',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Features');
  t('Main menu');
  t('Menu items for any enabled features.');
  t('System Menu');
  t('The <em>Main</em> menu is used on many sites to show the major sections of the site, often in a top navigation bar.');


  return $menus;
}
