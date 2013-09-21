<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 
[#items] => array (
    [0] => array (
        [fid] => [24]
        [alt] => []
        [title] => []
        [width] => [4110]
        [height] => [2735]
        [uid] => [1]
        [filename] => [486+76th+St_004-2340528345-O.jpg]
        [uri] => [public://486+76th+St_004-2340528345-O_8.jpg]
        [filemime] => [image/jpeg]
        [filesize] => [2520757]
        [status] => [1]
        [timestamp] => [1375116485]

[0] => array (
	[#items] => array (
		[fid] => [24]
		[alt] => []
		[title] => []
		[width] => [4110]
		[height] => [2735]
		[uid] => [1]
		[filename] => [486+76th+St_004-2340528345-O.jpg]
		[uri] => [public://486+76th+St_004-2340528345-O_8.jpg]
		[filemime] => [image/jpeg]
		[filesize] => [2520757]
		[status] => [1]
		[timestamp] => [1375116485]
[field_image_status] => array (
   [#title] => [Image Status]
   [#items][0][value] => [1]
   [0][#markup] = [Enabled]
[field_image_featured] => array (
   [#title] => [Featured]
   [#items][0][value] => [0]
   [0][#markup] => [Not Featured] 
 
 
 
 */
  for ($i = 0; $i < count($node->field_media['und']); $i++):
    $items[] = $node->field_media['und'][$i]['value'];
  endfor;


  $sql = db_query("SELECT fi.field_image_fid AS fid, fis.field_image_status_value AS image_status, field_image_featured_value AS featured, n.nid 
  FROM field_collection_item ci 
  INNER JOIN field_data_field_media m ON ci.item_id = m.field_media_value 
  LEFT JOIN node n ON m.entity_id = n.nid
  INNER JOIN field_data_field_image fi ON ci.item_id = fi.entity_id AND fi.bundle = 'field_media'
  INNER JOIN field_data_field_image_featured fif ON ci.item_id = fif.entity_id AND fif.bundle = 'field_media'
  INNER JOIN field_data_field_image_status fis ON ci.item_id = fis.entity_id AND fis.bundle = 'field_media'
  WHERE ci.item_id IN (:items)", array(':items' => $items))->fetchAll();
  
  if ($sql) {
    $count			= count($sql);
    $result			= array_chunk($sql, 5);
    $numThumbSets	= ceil($count/5);
  }

  $next = db_query("SELECT nid AS next_id FROM node 
  					WHERE type = 'home' AND nid > :nid
  					ORDER BY nid ASC", array(':nid' => $node->nid))->fetchAll();
  ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  
  <div class="bread-crumbs" id="home-details-breadcrumbs">
    <a href="/featured-homes" id="featured-homes-breadcrumb">&laquo; Back To Featured Homes</a>
    <?php  if ($next):
    $next_home = $next[0]->next_id;
    ?>
    <a href="/node/<?php print $next_home; ?>" id="featured-homes-next">Next Home</a>
    <?php endif; ?>
  </div>

  
  <section id="home-details-slider">
    <div class="home-detail-image">  
  <?php
  $thumbs = '<div class="thumb-containers">';
  $fives = array(5,10,15,20,25,30,35,40,45,50);
  
  if ($sql):
  $count				= count($sql);
  $result				= array_chunk($sql, 5);
  $numThumbSets			= ceil($count/5);
  $prev = $next = $n	= 1; 
  
  for ($set = 0, $ts = 1, $a = 1; $set < $numThumbSets; $set++, $ts++, $a++):
    // Set of five or less images
    $imageSet		= $result[$set];  
    $thumbs .= '<div class="thumbs" id="thumbs'.$ts.'">';
    $thumbs .= '<a href="#thumbs' . $prev . '" id="prev-thumbs' . $prev . '" class="info-thumb-link prev"><</a>';
    $next++; $prev++;
    $c			= 1;
    for ($i = 0; $i < count($imageSet); $i++):  
      $r			= $imageSet[$i];
      $fid			= $r->fid;
      $status		= $r->image_status;
      
      if ($status == 1):
	    $file		= file_load($fid);
	    $image		= image_style_url('home_details_large', $file->uri);
	    $thumb		= image_style_url('home_details_thumb', $file->uri); 
	    ?>
	    <figure id="image<?php print $n; if($n == 1) { print ' class="active"'; } ?>" ><img src="<?php print $image; ?>" alt=""></figure>
	    <?php
		//if ($a == 1) { $next++; $prev++; }
		if ($c == 1) { $class = 'thumb-link first'; } else { $class = 'thumb-link'; }
        $thumbs .= '<a href="#image' . $n . '" class="'.$class.'" id="' . $n . '"><img src="' . $thumb . '" alt="" /></a>';
	    $c++;
        $n++;
      endif;
    endfor;	
    $thumbs .= '<a href="#thumbs'.$next.'" id="next-thumbs'.$next.'" class="info-thumb-link next">></a>';
    $thumbs .= '</div>';
    
  endfor;

  $thumbs .= '</div>';
  //$thumbs .= '<a href="#thumbs' .$next. '" id="prev-thumbs' .$next. '" class="info-thumb-link prev"><</a>';
  $thumbnails = $thumbs;
  else:
    $thumbnails = '';
  endif; 
  ?>
    </div>
    <div id="home-details-pagination"><?php print $thumbnails; ?></div>
  </section>
  
<?php
  /*
    for ($i = 0; $i < count($node->field_image_settings['und']); $i++):
      $imgSettings = $node->field_image_settings['und'][$i];
      $tmpImg = $imgSettings['composed'];
      $imgInfo = unserialize($tmpImg);
      print_r($imgInfo);
      
      if (is_array($imgInfo)) {
	     $fid = $imgInfo[1];   
	     $file = file_load($fid);
	     $image = image_style_url('featured_home', $file->uri);
	     print '<img src="' . $image . '" border="0" />';
      }
      
    endfor;
	     $file = file_load(5);
	     $image = image_style_url('featured_home', $file->uri);
	     print '<img src="' . $image . '" border="0" />'; */   
  ?>

  <main class="home-details">
    <article id="home-description">
      <h2><?php print $node->title; ?></h2>
      <p><?php print $node->body['und'][0]['safe_value']; ?></p>
    <?php
      // We hide the comments and links now so that we can render them later.
      //hide($content['comments']);
      //hide($content['links']);
      //print render($content);
    ?>
    </article>
    <section id="home-features">
    <?php
      if ( isset($node->field_features['und']) && count($node->field_features['und']) > 0):
    ?>     
      <h3>Special Features</h3>
    <span class="top-shadow"></span>
    <ul>
    <?php for ($i = 0; $i < count($node->field_features['und']); $i++): ?>
      <li><?php print $node->field_features['und'][$i]['value']; ?></li>
    <?php endfor; ?>
    </ul>
    <?php endif; ?>
    <?php
      if (isset($node->field_home_testimonial['und'])):
    ?> 
    <?php /* <a href="/testimonials/<?php $node->nid; ?>" class="orange-bevel-link" title="Hear From The Owners">Hear From The Owners</a> */ ?>
    <a href="/testimonials" class="orange-bevel-link" title="Hear From The Owners">Hear From The Owners</a>
    <?php endif; ?>
    </section>
  </main> 
  <div class="clearfix"></div>
  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>
