<?php
function actuos_preprocess_html(&$variables) {
}
function actuos_preprocess_page(&$variables) {
	drupal_add_css ( '//fonts.googleapis.com/css?family=Open+Sans:300italic,400,400italic,300,600,600italic,700&subset=cyrillic-ext,latin', 'external' );
	drupal_add_css ( '//fonts.googleapis.com/css?family=Lato:100,300,400', 'external' );
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css', 'external' );
	drupal_add_js ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', 'external' );
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', 'external' );
	
	
	drupal_add_js ( '//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', 'external' );
	drupal_add_js ( '//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', 'external' );
	
	
	if (! $variables ['logged_in'] && $variables ['is_front']) {
		$variables ['theme_hook_suggestions'] [] = 'page__front__anonymous';
		$form = drupal_get_form('user_login_block');
		$variables['login_content'] = drupal_render($form);
// 		var_dump($variables['content']);
	} else {
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/customz.css', 'file');
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/linicon_style.css', 'file');
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/style-responsive.css', 'file');
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/style.css', 'file');
		
		drupal_add_js(drupal_get_path('theme', 'actuos') . '/assets/javascripts/jquery.nicescroll.js', 'file');
		drupal_add_js(drupal_get_path('theme', 'actuos') . '/assets/javascripts/jquery.touchSwipe.min.js', 'file');
		drupal_add_js(drupal_get_path('theme', 'actuos') . '/assets/javascripts/actuos.js');
	}
	$variables['submenu'] = array();
	$variables['main_menu'] = menu_tree('main-menu');
	$variables['user_menu'] = menu_tree('user-menu');
	
// 	dpm($variables['user_menu']);
// 	dpm($variables['main_menu']);
	$activePageTitle = '';
	foreach ($variables['user_menu'] as $key => $menu){
		if(isset($menu['#below']) && count($menu['#below'])){
			$variables['submenu'] += $menu['#below'];
			$variables['user_menu'][$key]['#below'] = array();
		}
		if (isset($menu['#original_link']) && $menu['#original_link']['in_active_trail']){
			$activePageTitle = $menu['#title'];
		}
	}
	foreach ($variables['main_menu'] as $key => $menu){
		if(isset($menu['#below']) && count($menu['#below'])){
			$variables['submenu'] += $menu['#below'];
			$variables['main_menu'][$key]['#below'] = array();
		}
		if (isset($menu['#original_link']) && $menu['#original_link']['in_active_trail']){
			$activePageTitle = $menu['#title'];
		}
		
	}
	// $variables['main_menu']['#theme_wrappers'] = array('menu_tree__primary');
	switch ($activePageTitle){
		case 'Portfolio Analysis':
			$color = 'red';
			$header_icon = array('fa-pie-chart');
			break;
		case 'Performance':
			$color = 'green';
			$header_icon = array('fa-bar-chart');
			break;
		case 'Sale Management':
			$color = 'blue';
			$header_icon = array('fa-dollar');
			break;
		case 'Post Sale':
			$color = 'yellow';
			$header_icon = array('fa-connectdevelop');
			break;
		case 'Notifications':
			$color = 'gray';
			$header_icon = array('fa-bell');
			break;
		case 'News':
			$color = 'gray';
			$header_icon = array('fa-newspaper-o');
			break;
		case 'Settings':
			$color = 'gray';
			$header_icon = array('fa-cog');
			break;
		default:
			$color = 'gray';
			$header_icon = array('fa-chevron-circle-right');
			break;
	}
	
	$variables['page_color'] = $color;
	$variables['header_icon'] = implode(' ', $header_icon);
	
}
function actuos_form_alter(&$form, &$form_state, $form_id) {
	switch ($form_id) {
		case 'user_login_block' :
			$item = array ();
			$items [] = array (
					'data' => l ( t ( 'Forgot password' ), 'user/password', array (
							'html' => TRUE 
					) ),
					'class' => array (
							'forgot-pswd',
							'pull-right' 
					) 
			);
			$form ['links'] ['#markup'] = theme ( 'item_list', array (
					'items' => $items 
			) );
			$form ['actions'] ['submit'] ['#attributes'] ['class'] = array (
					'btn',
					'btn-default',
					'log_in' 
			);
			$form ['remember_me'] ['#title'] = t ( '<span>Keep me signed in</span>' );
			$form ['name'] ['#title'] = t ( 'E-mail address' );
			$form ['name'] ['#attributes'] ['placeholder'] = t ( 'example@email.com' );
			$form ['name'] ['#attributes'] ['class'] = array (
					'form-control',
					'loginmail' 
			);
			$form ['name'] ['#field_prefix'] = '<div class="form-group">';
			$form ['name'] ['#field_suffix'] = '<i class="inputicon_email fa fa-envelope"></i></div>';
			// $form['pass']['#attributes']['placeholder'] = t('*******');
			$form ['pass'] ['#attributes'] ['class'] = array (
					'form-control',
					'loginpassword' 
			);
			$form ['pass'] ['#field_prefix'] = '<div class="form-group">';
			$form ['pass'] ['#field_suffix'] = '<i class="inputicon_pswd fa fa-lock"></i></div>';
			break;
	}
}

function actuos_menu_tree__user_menu($variables) {
	return '<ul class="sidebar-menu user-menu">' . $variables['tree'] . '</ul>';
}
function actuos_menu_tree__main_menu($variables) {
	return '<ul class="sidebar-menu main-menu">' . $variables['tree'] . '</ul>';
}
function actuos_menu_link(array $variables) {
	if ('menu_link__main_menu' == $variables ['theme_hook_original']) {
		$variables['element']['#attributes']['class'][] = 'sub-menu';
		if ('Portfolio Analysis' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-pie-chart"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#attributes']['class'][] = 'red-icon';
			$variables['element']['#localized_options']['html'] = true;
		}
		if ('Performance' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-bar-chart"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#attributes']['class'][] = 'green-icon';
			$variables['element']['#localized_options']['html'] = true;
		}
		if ('Sale Management' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-dollar"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#attributes']['class'][] = 'blue-icon';
			$variables['element']['#localized_options']['html'] = true;
		}
		if ('Post Sale' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-connectdevelop"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#attributes']['class'][] = 'yellow-icon';
			$variables['element']['#localized_options']['html'] = true;
		}
		
	}
	if ('menu_link__user_menu' == $variables ['theme_hook_original']) {
		
		$variables['element']['#attributes']['class'][] = 'sub-menu';
		if ('Notifications' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-bell"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#localized_options']['html'] = true;
		}
		if ('News' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-newspaper-o"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#localized_options']['html'] = true;
		}
		if ('Settings' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-cog"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#localized_options']['html'] = true;
		}
		if ('Logout' == $variables ['element'] ['#title']) {
			$variables['element']['#title'] = '<i class="fa fa-sign-out"> </i><span>' . $variables['element']['#title'] . '</span>';
			$variables['element']['#localized_options']['html'] = true;
		}
	}
	return theme_menu_link ( $variables );
}