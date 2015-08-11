<?php
function insights_preprocess_html(&$variables) {
}
function insights_preprocess_page(&$variables) {
	
	drupal_add_css ( '//fonts.googleapis.com/css?family=Open+Sans:300italic,400,400italic,300,600,600italic,700&subset=cyrillic-ext,latin', 'external' );
	drupal_add_css ( '//fonts.googleapis.com/css?family=Lato:100,300,400', 'external' );
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css', 'external' );
	drupal_add_js ( '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array('type' => 'external', 'scope' => 'footer'));
	drupal_add_css ( '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', 'external' );
	drupal_add_css ( '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css', 'external' );
	
	
	drupal_add_js ( '//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', array('type' => 'external', 'scope' => 'footer') );
	drupal_add_js ( '//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', array('type' => 'external', 'scope' => 'footer') );
	drupal_add_js ( '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js', array('type' => 'external', 'scope' => 'footer') );
	
	$noFrontPages = array();
	
	if (! $variables ['logged_in'] && !in_array(current_path(), $noFrontPages)) {
		$variables ['theme_hook_suggestions'] [] = 'page__front__anonymous';
		
		if (in_array(current_path(), array('user/register', 'user/password'))){
			$variables['login_content'] = drupal_render($variables['page']['content']);
		} else {
			$form = drupal_get_form('user_login_block');
			$variables['login_content'] = drupal_render($form);
		}
		
// 		var_dump($variables['page']['content']);
// 		var_dump($variables['content']);
	} else {
// 		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/customz.css', 'file');
// 		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/linicon_style.css', 'file');
// 		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/style-responsive.css', 'file');
// 		drupal_add_css(drupal_get_path('theme', 'actuos') . '/assets/stylesheets/style.css', 'file');
		
// 		drupal_add_js(drupal_get_path('theme', 'actuos') . '/assets/javascripts/jquery.nicescroll.js', 'file');
// 		drupal_add_js(drupal_get_path('theme', 'actuos') . '/assets/javascripts/jquery.touchSwipe.min.js', 'file');
		drupal_add_js(drupal_get_path('theme', 'insights') . '/assets/javascripts/insights.js');
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
// 	switch ($activePageTitle){
// 		case 'Portfolio Analysis':
// 			$color = 'red';
// 			$header_icon = array('fa-pie-chart');
// 			break;
// 		case 'Performance':
// 			$color = 'green';
// 			$header_icon = array('fa-bar-chart');
// 			break;
// 		case 'Sale Management':
// 		case 'Sales Performance':
// 			$color = 'blue';
// 			$header_icon = array('fa-dollar');
// 			break;
// 		case 'User Analysis':
// 			$color = 'green';
// 			$header_icon = array('fa-users');
// 			break;
// 		case 'Post Sale':
// 			$color = 'yellow';
// 			$header_icon = array('fa-connectdevelop');
// 			break;
// 		case 'Notifications':
// 			$color = 'gray';
// 			$header_icon = array('fa-bell');
// 			break;
// 		case 'News':
// 			$color = 'gray';
// 			$header_icon = array('fa-newspaper-o');
// 			break;
// 		case 'Settings':
// 			$color = 'gray';
// 			$header_icon = array('fa-cog');
// 			break;
// 		default:
// 			$color = 'gray';
// 			$header_icon = array('fa-chevron-circle-right');
// 			break;
// 	}
	
// 	$variables['page_color'] = $color;
// 	$variables['header_icon'] = implode(' ', $header_icon);
	
}
function insights_form_alter(&$form, &$form_state, $form_id) {
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
		case 'user_pass':
			$form ['name'] ['#field_prefix'] = '<div class="form-group">';
			$form ['name'] ['#field_suffix'] = '<i class="inputicon_email fa fa-envelope"></i></div>';
			$form ['name'] ['#attributes'] ['placeholder'] = t ( 'example@email.com' );
			
			$form['actions']['submit']['#attributes']['class'] = array('btn', 'btn-default', 'user-submit-btn');
			
			break;	
		case 'user_register_form':
			$form['account']['name'] ['#field_prefix'] = '<div class="form-group">';
			$form['account']['name'] ['#field_suffix'] = '<i class="inputicon_email fa fa-user"></i></div>';
			$form['account']['name'] ['#attributes'] ['placeholder'] = t ( 'johnsmith' );
			
			$form['account']['mail'] ['#field_prefix'] = '<div class="form-group">';
			$form['account']['mail'] ['#field_suffix'] = '<i class="inputicon_email fa fa-envelope"></i></div>';
			$form['account']['mail'] ['#attributes'] ['placeholder'] = t ( 'example@email.com' );
			
			$form['actions']['submit']['#attributes']['class'] = array('btn', 'btn-default', 'user-submit-btn');
			break;
		case 'user_profile_form':
			
			
			
			$form['picture']['#access'] = FALSE;
			$form['timezone']['#collapsible'] = FALSE;
			
			$form['account_setthing'] = array(
				'#type' => 'fieldset',
				'#title' => t('Account settings'),
				'#weight' => -10,
			);
			$form['account']['enter_password'] = array(
				'#type' => 'fieldset',
				'#title' => t('Enter Password'),
				'#weight' => -10,
			);
			$form['account']['change_email'] = array(
				'#type' => 'fieldset',
				'#title' => t('Change E-mail'),
				'#weight' => -2,
			);
			$form['account']['change_password'] = array(
				'#type' => 'fieldset',
				'#title' => t('Change Password'),
				'#weight' => 1,
			);
			$form['account']['pass']['#weight'] = 2;
			
			$form ['actions'] ['submit'] ['#attributes'] ['class'] = array (
				'btn',
				'btn-primary',
			);
			
			break;
	}
}

function insights_menu_tree__user_menu($variables) {
	return '<ul class="sidebar-menu user-menu">' . $variables['tree'] . '</ul>';
}
function insights_menu_tree__main_menu($variables) {
	return '<ul class="sidebar-menu main-menu">' . $variables['tree'] . '</ul>';
}
function insights_menu_link(array $variables) {
	if ('menu_link__main_menu' == $variables ['theme_hook_original']) {
		$variables['element']['#attributes']['class'][] = 'sub-menu';
		
// 		switch ($variables ['element'] ['#title']){
// 			case 'Portfolio Analysis':
// 				$variables['element']['#title'] = '<i class="fa fa-pie-chart"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#attributes']['class'][] = 'red-icon';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'Performance':
// 				$variables['element']['#title'] = '<i class="fa fa-bar-chart"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#attributes']['class'][] = 'green-icon';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'User Analysis':
// 				$variables['element']['#title'] = '<i class="fa fa-users"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#attributes']['class'][] = 'green-icon';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'Sale Management':
// 			case 'Sales Performance':
// 				$variables['element']['#title'] = '<i class="fa fa-dollar"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#attributes']['class'][] = 'blue-icon';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'Post Sale':
// 				$variables['element']['#title'] = '<i class="fa fa-connectdevelop"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#attributes']['class'][] = 'yellow-icon';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 		}
		
	}
	if ('menu_link__user_menu' == $variables ['theme_hook_original']) {
		
		$variables['element']['#attributes']['class'][] = 'sub-menu';
// 		switch ($variables ['element'] ['#title']){
// 			case 'Notifications':
// 				$variables['element']['#title'] = '<i class="fa fa-bell"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'News':
// 				$variables['element']['#title'] = '<i class="fa fa-newspaper-o"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'Settings':
// 				$variables['element']['#title'] = '<i class="fa fa-cog"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 			case 'Logout':
// 				$variables['element']['#title'] = '<i class="fa fa-sign-out"> </i><span>' . $variables['element']['#title'] . '</span>';
// 				$variables['element']['#localized_options']['html'] = true;
// 				break;
// 		}
		
		
	}
	return theme_menu_link ( $variables );
}


/**
 * Implements hook_js_alter()
 *
 * Moves scripts from the header scope (and others) to the footer, maintaining
 * their relative positions by adjusting script groups while also making
 * sure settings are positioned just after the original header scripts.
 */
function insights_js_alter(&$javascript) {
	// List the scripts we want in to remain in their original scope.
	$untouched_scripts = array(
	//   'sites/all/libraries/modernizr/modernizr.min.js',
	);

	$scopes = array(
			'header' => array(),
			'other' => array(),
			'footer' => array(),
	);
	// Scope group weights.
	$header_max = NULL;
	$other_min = NULL;
	$other_max = NULL;
	$footer_min = NULL;

	foreach ($javascript as $key => &$script) {
		// Categorize scripts by original scope.
		switch ($script['scope']) {
			case 'header':
				// Find the last header group weight.
				if (!isset($header_max) || $script['group'] > $header_max) {
					$header_max = $script['group'];
				}

			case 'footer':
				// Find the first footer group weight.
				if (!isset($footer_min) || $script['group'] < $footer_min) {
					$footer_min = $script['group'];
				}
				$scopes[$script['scope']][] = &$script;
				break;

				// It's impossible for to know in which order scopes defined by a
				// theme will be rendered, so just put them all together for now.
				// Ordering these scopes, if needed, is left as an exercise for the reader.
			default:
				// Find the first other group weight.
				if (!isset($other_min) || $script['group'] < $other_min) {
					$other_min = $script['group'];
				}
				// Find the last other group.
				if (!isset($other_max) || $script['group'] > $other_max) {
					$other_max = $script['group'];
				}
				$scopes['other'][] = &$script;
		}
		// Move scripts to footer.
		if ($script['scope'] !== 'footer' && !in_array($script['data'], $untouched_scripts)) {
			$script['scope'] = 'footer';
		}
	}
	if (!isset($header_max)) {
		// Just in case there were no header scripts.
		$header_max = -1;
	}

	$last_max = $header_max + 1;

	// Add settings as an inline script after the last header group.
	if (isset($javascript['settings'])) {
		$inline_settings = array(
				'type' => 'inline',
				'scope' => 'footer',
				'data' => 'jQuery.extend(Drupal.settings, ' . drupal_json_encode(drupal_array_merge_deep_array($javascript['settings']['data'])) . ");",
				'group' => $last_max,
				'every_page' => TRUE,
				'weight' => 0,
		) + drupal_js_defaults();
		// No need for drupal_get_js() to do this again.
		unset($javascript['settings']);

		$javascript['inline_settings'] = $inline_settings;
	}

	// If there are other scopes, push them all down below the header scripts.
	if (isset($other_min) && $other_min <= $last_max) {
		$diff = $last_max - $other_min + 1;
		foreach ($scopes['other'] as $key => &$script) {
			$script['group'] += $diff;
		}
		$last_max = $other_max + $diff;
	}
	if (!isset($footer_min)) {
		// Just in case there were no footer scripts.
		$footer_min = $last_max;
	}
	// Finally push footer scripts down below everything else.
	if ($footer_min <= $last_max) {
		$diff = $last_max - $footer_min + 1;
		foreach ($scopes['footer'] as $key => &$script) {
			$script['group'] += $diff;
		}
	}
	
}
 
function insights_status_messages($variables) {
 	$display = $variables ['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  
  $type2Class = array(
  		'status' => 'alert-info',
  		'error' => 'alert-danger',
  		'warning' => 'alert-warning',
  );
  
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"msg alert " . $type2Class[$type] . "\">\n";
    if (!empty($status_heading [$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading [$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= reset($messages);
    }
    $output .= "</div>\n";
  }
  return $output;
}