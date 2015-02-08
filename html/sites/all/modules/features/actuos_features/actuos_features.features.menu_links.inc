<?php
/**
 * @file
 * actuos_features.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function actuos_features_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu_performance:performance
  $menu_links['main-menu_performance:performance'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'performance',
    'router_path' => 'performance',
    'link_title' => 'Performance',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_performance:performance',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -49,
    'customized' => 1,
  );
  // Exported menu link: main-menu_portfolio-analysis:portfolio-analysis
  $menu_links['main-menu_portfolio-analysis:portfolio-analysis'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'portfolio-analysis',
    'router_path' => 'portfolio-analysis',
    'link_title' => 'Portfolio Analysis',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_portfolio-analysis:portfolio-analysis',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -50,
    'customized' => 1,
  );
  // Exported menu link: main-menu_post-sale:post-sale
  $menu_links['main-menu_post-sale:post-sale'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'post-sale',
    'router_path' => 'post-sale',
    'link_title' => 'Post Sale',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_post-sale:post-sale',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -47,
    'customized' => 1,
  );
  // Exported menu link: main-menu_sale-management:sale-management
  $menu_links['main-menu_sale-management:sale-management'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'sale-management',
    'router_path' => 'sale-management',
    'link_title' => 'Sale Management',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_sale-management:sale-management',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -48,
    'customized' => 1,
  );
  // Exported menu link: user-menu_news:news
  $menu_links['user-menu_news:news'] = array(
    'menu_name' => 'user-menu',
    'link_path' => 'news',
    'router_path' => 'news',
    'link_title' => 'News',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'user-menu_news:news',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -49,
    'customized' => 1,
  );
  // Exported menu link: user-menu_notifications:notifications
  $menu_links['user-menu_notifications:notifications'] = array(
    'menu_name' => 'user-menu',
    'link_path' => 'notifications',
    'router_path' => 'notifications',
    'link_title' => 'Notifications',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'user-menu_notifications:notifications',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -50,
    'customized' => 1,
  );
  // Exported menu link: user-menu_settings:user
  $menu_links['user-menu_settings:user'] = array(
    'menu_name' => 'user-menu',
    'link_path' => 'user',
    'router_path' => 'user',
    'link_title' => 'Settings',
    'options' => array(
      'alter' => TRUE,
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'user-menu_settings:user',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => -48,
    'customized' => 1,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('News');
  t('Notifications');
  t('Performance');
  t('Portfolio Analysis');
  t('Post Sale');
  t('Sale Management');
  t('Settings');


  return $menu_links;
}
