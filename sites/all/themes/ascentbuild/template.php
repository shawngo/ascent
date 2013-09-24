<?php




/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function ascentbuild_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function ascentbuild_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

function ascentbuild_preprocess_node(&$variables) {

//  $variables['featured_region'] = theme('blocks', 'featured_region');
  if ($blocks  = block_get_blocks_by_region('featured_region')) {
    $variables['featured_region'] = $blocks;
  }

  $variables['node'] = $variables['elements']['#node'];
  $node = $variables['node'];
  if ($node->type == 'info') {
    $variables['node'] = $node;
    
    if ($variables['node']->type == 'info'){
	ctools_include('ajax');
	ctools_include('modal');
	ctools_modal_add_js();

    $modal_style = array(
    'ctools-sample-style' => array(
    'modalSize' => array('type' => 'scale', 'addWidth' => 25, 'addHeight' => 25,),
    'modalOptions' => array('opacity' => 0.8,'background-color' => '#000',),
    'closeText' => t('Close'),
    'animation' => 'fadeIn',
    'modalTheme' => 'CToolsSampleModal',
    'throbber' => theme('image', array('path' => '/misc/throbber.gif', 'alt' => t('Loading...'),'title' => t('Loading'))),
    ),);  
	
    drupal_add_js($modal_style, 'setting');
    ctools_add_js('ctools-ajax-sample', 'ctools_ajax_sample');
    ctools_add_css('ctools-ajax-sample', 'ctools_ajax_sample');	
    $sql = db_query("SELECT t.field_video_image_fid AS fid, u.field_video_link_value AS url, n.title, n.nid
					  FROM node n
					  INNER JOIN field_data_field_video_image t ON n.nid = t.entity_id
					  INNER JOIN field_data_field_video_link u ON n.nid = u.entity_id
					  WHERE t.field_video_image_fid IS NOT NULL LIMIT 2")->fetchAll();
    if (count($sql) > 0) {
      $videos = '';
      for ($i = 0; $i < count($sql); $i++) {
        $r			= $sql[$i];
        $fid		= $r->fid;
        $file		= file_load($fid);
        $image		= image_style_url('feature_videos_thumb', $file->uri);
        $button		= ctools_modal_text_button($r->title, 'featured-videos/nojs/' . $r->nid, 
      					$r->title, 'ctools-modal-ctools-sample-style button');
	    $link		= ctools_modal_text_button($r->title, 'featured-videos/nojs/' . $r->nid, $r->title, 'ctools-modal-ctools-sample-style');
        $videos		.= '<article id="1">' . $button;
        $videos		.= '<img src="'.$image.'" alt="Meet Pat Seeger" id="video-one" />';
        $videos		.= '<figcaption>' . $link;
        $videos		.= '</figcaption></article>'; 
      }       
    }
    $variables['info_videos'] = $videos;
    }  
  }
}

/**
 * Override or insert variables into the page template.
 */
function ascentbuild_process_page(&$variables) {

  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }

  // WRAPPER CLASS
  switch (arg(0)) {
    case 'featured-homes':
      $variables['wrap_class'] = 'featured-homes';   
    break;	  
    case 'node':
      $variables['wrap_class'] = 'home-detail';
	  //if ($variables['node']->type == 'home'){}
    break;	  
    default:
      $variables['wrap_class'] = 'def';    
    break;	  
  }
  ctools_include('ajax');
  ctools_include('modal');
  ctools_modal_add_js();
	
	//$throbber = theme('image', array('path' => ctools_image_path('throbber.gif'), 'title' => t('Loading...'), 'alt' => t('Loading')));
	//$closeImage = theme('image', array('path' => ctools_image_path('icon-close-window.png'), 'title' => t('Close'),'alt' => t('Close')));
    $modal_style = array(
    'ctools-sample-style' => array(
//    'modalSize' => array('type' => 'scale', 'addWidth' => 20, 'addHeight' => 25,),
    'modalSize' => array('type' => 'fixed', 'width' => 800, 'height' => 440,),
    'modalOptions' => array('opacity' => 0.8,'background-color' => '#000',),
    'closeText' => t('Close'),
    'animation' => 'fadeIn',
    'modalTheme' => 'CToolsSampleModal',
    'throbber' => theme('image', array('path' => '/misc/throbber.gif', 'alt' => t('Loading...'),'title' => t('Loading'))),
    ),);  
	
  drupal_add_js($modal_style, 'setting');
  ctools_add_js('ctools-ajax-sample', 'ctools_ajax_sample');
  ctools_add_css('ctools-ajax-sample', 'ctools_ajax_sample');	
  $variables['contact_modal'] = ctools_modal_text_button('Contact Us</span>', 'contact-us/nojs', '', 'happy-modal ctools-modal-ctools-sample-style');

 

  //$js = "";
  //drupal_add_js($js, 'inline');

  $js_load = array('type' => 'file', 'scope' => 'header', 'group' => JS_THEME, 'every_page' => TRUE,'weight' => 0);

  drupal_add_js(drupal_get_path('theme', 'ascentbuild') .'/js/ascentbuild.js', $js_load);

  if ($variables['is_front'] == TRUE) {

    $oTitle = 'Building an Ascent Home';
    $tTitle = 'Visit Our Model Home';
    $one = ctools_modal_text_button(t($oTitle), 'featured-videos/nojs/1', t($oTitle), 'ctools-modal-ctools-sample-style');
    $two = ctools_modal_text_button(t($tTitle), 'featured-videos/nojs/2', t($tTitle), 'ctools-modal-ctools-sample-style');  
  
/*
    $variables['featured_videos'] = '<article id="video-one">
        <img src="/sites/all/themes/ascentbuild/images/video-1.jpg" alt="Building an Ascent Home" id="featured-video-one" />
        <caption>07.23.13</caption>
        <figcaption>' . $one . '</figcaption></article>';
    $variables['featured_videos'] .= '<article id="video-two">
        <img src="/sites/all/themes/ascentbuild/images/video-1.jpg" alt="Visit Our Model Home" id="featured-video-two" />
        <span>07.23.13</span><figcaption>' . $two . '</figcaption></article>';
*/

    $variables['home_slide'] = '';
    $variables['slide_links'] = '';   	  
    $sql = db_query("SELECT fi.field_image_fid AS fid, fis.field_image_status_value AS image_status, field_image_featured_value AS featured 
  					FROM field_collection_item ci
					INNER JOIN field_data_field_image fi ON ci.item_id = fi.entity_id
					INNER JOIN field_data_field_image_featured fif ON ci.item_id = fif.entity_id
					INNER JOIN field_data_field_image_status fis ON ci.item_id = fis.entity_id
					WHERE fif.field_image_featured_value = 1 AND field_image_status_value = 1")->fetchAll();

    for ($i = 0, $a = 1, $n = 2; $i < count($sql); $i++, $a++, $n++) {
      $row = $sql[$i];
      $fid = $row->fid;
      $file = file_load($fid);
      $image = image_style_url('front_slide', $file->uri);
      if ($a == 1) { $lClass = $rClass = 'class="active"'; } else { $lClass = $rClass = ''; }
      $variables['home_slide'] .= '<figure id="home' . $a . '" ' . $lClass . '>';
      $variables['home_slide'] .= '<a href="#home' . $a . '" rel="home' . $a . '" class="slide-link prev"></a>'; 
      $variables['home_slide'] .= '<div class="image-holder"><img src="' . $image . '" /></div>';
      $variables['home_slide'] .= '<figcaption><span>The Details Matter</span></figcaption>';
      
		if ($a == count($sql)){
		  $variables['home_slide'] .= '<a href="#home1" class="slide-link next"></a></figure>';
		} else {
		  $variables['home_slide'] .= '<a href="#home' . $n . '" class="slide-link next"></a></figure>';			
		}
      $variables['slide_links'] .= '<a href="#home' . $a . '" rel="home' . $a . '"></a>'; 	    
    }  
    $variables['featured_videos'] = theme('ascent_featured_videos');	  
  } 
}

function ascentbuild_page_alter($page) {
  
  /*
  $mobileoptimized = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array('name' =>  'MobileOptimized', 'content' =>  'width'),
  );

  $handheldfriendly = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array('name' =>  'HandheldFriendly', 'content' =>  'true'),
  );

  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array('name' =>  'viewport','content' =>  'width=device-width, initial-scale=1'),
  );

  drupal_add_html_head($mobileoptimized, 'MobileOptimized');
  drupal_add_html_head($handheldfriendly, 'HandheldFriendly');
  drupal_add_html_head($viewport, 'viewport');*/

  $typekit = array('type' => 'external', 
  'scope' => 'header',
  'group' => JS_THEME,
  'every_page' => TRUE,
  'weight' => -1);
  
  $typekit_load = array('type' => 'inline',
  'scope' => 'header',
  'group' => JS_THEME,
  'every_page' => TRUE,
  'weight' => 0);

  drupal_add_js('//use.typekit.net/wak5evd.js', $typekit);
  drupal_add_js('try{Typekit.load();}catch(e){}', $typekit_load);
		
}

function ascentbuild_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
	$breadcrumb[] = drupal_get_title();
    $output .= '<div class="breadcrumb">' . implode('<span class="sep">»</span>', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Add Javascript for responsive mobile menu

if (theme_get_setting('responsive_menu_state')) {

	drupal_add_js(drupal_get_path('theme', 'ascentbuild') .'/js/jquery.mobilemenu.js');

	$responsive_menu_switchwidth		=theme_get_setting('responsive_menu_switchwidth');
	$responsive_menu_topoptiontext	=theme_get_setting('responsive_menu_topoptiontext');
	
	drupal_add_js('jQuery(document).ready(function($) { 
	
	$("#navigation .content > ul").mobileMenu({
		prependTo: "#navigation",
		combine: false,
		switchWidth: ' . $responsive_menu_switchwidth . ',
		topOptionText: "' . $responsive_menu_topoptiontext . '"
	});
	
	});',
	array('type' => 'inline', 'scope' => 'header'));

} */
//EOF:Javascript
