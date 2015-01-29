<?php
function actuos_theme(&$existing, $type, $theme, $path) {
	$items = array ();
	$items ['user_login_block'] = array (
			'render element' => 'form',
			'template' => 'templates/system/user-login-block' 
	);
	return $items;
}
function actuos_preprocess_user_login_block(&$variables) {
	$variables ['rendered'] = drupal_render_children ( $variables ['form'] );
}
function actuos_preprocess_html(&$variables) {
}
function actuos_preprocess_page(&$variables) {
	drupal_add_css ( '//fonts.googleapis.com/css?family=Open+Sans:300italic,400,400italic,300,600,600italic,700&subset=cyrillic-ext,latin', 'external' );
	drupal_add_css ( '//fonts.googleapis.com/css?family=Lato:100,300,400', 'external' );
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', 'external' );
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css', 'external' );
	drupal_add_js ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', 'external' );
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', 'external' );
	
	
	drupal_add_js ( '//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', 'external' );
	drupal_add_js ( '//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', 'external' );
	if ($variables ['is_front'] && ! $variables ['logged_in']) {
		$variables ['theme_hook_suggestions'] [] = 'page__front__anonymous';
	} else {
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/customz.css', 'file');
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/linicon_style.css', 'file');
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/style-responsive.css', 'file');
		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/style.css', 'file');
		drupal_add_js(drupal_get_path('theme', 'actuos') . '/assets/javascripts/jquery.nicescroll.js', 'file');
	}
	
	$variables ['main_menu'] = menu_tree ( variable_get ( 'menu_main_links_source', 'main-menu' ) );
	$variables ['system_menu'] = menu_tree ( variable_get ( 'system_links_source', 'system-menu' ) );
	// $variables['main_menu']['#theme_wrappers'] = array('menu_tree__primary');
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
function actuos_menu_link(array $variables) {
	if ('menu_link__main_menu' == $variables ['theme_hook_original']) {
		
		if ('Home' == $variables ['element'] ['#title']) {
			$variables ['element'] ['#attributes'] ['class'] [] = 'home-menu';
			$variables ['element'] ['#attributes'] ['class'] [] = 'fa';
			$variables ['element'] ['#attributes'] ['class'] [] = 'fa-check';
			$variables ['element'] ['#prefix'] = 'eee2';
		}
		
		return theme_menu_link ( $variables );
	}
}