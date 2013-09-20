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
 */
 
$sql = db_query("SELECT field_image_fid AS fid, field_image_featured_value AS featured, field_image_status_value AS image_status   
				FROM field_collection_item ci
				INNER JOIN field_data_field_image fi ON ci.item_id = fi.entity_id
				INNER JOIN field_data_field_image_featured fif ON ci.item_id = fif.entity_id
				INNER JOIN field_data_field_image_status fis ON ci.item_id = fis.entity_id
				WHERE fif.field_image_featured_value = 1 AND field_image_status_value = 1")->fetchAll(); 
?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>


  <div id="information">
    <?php /*<section id="bread-crumbs">
	    <nav>
	      <a href="/our-story" title="Our Story">Our Story</a>
	      <a href="/our-team" title="Our Team">Our Team</a></nav>
    </section>
    <section id="info-slider">
    <div class="info-slider-image"> */?>
    
  <?php
  $thumbs = '<div class="thumb-containers">';

  
  if ($sql):
  $count				= count($sql);
  $result				= array_chunk($sql, 4);
  $numThumbSets			= ceil($count/4);
  $prev = $next = $n	= 1; 
  for ($set = 0, $ts = 1, $a = 1; $set < $numThumbSets; $set++, $ts++, $a++):
    // Set of five or less images
    $imageSet		= $result[$set];  
    
    
    $thumbs .= '<div class="thumbs" id="thumbs'.$ts.'">';
    $thumbs .= '<a href="#thumbs' . $prev . '" id="prev-thumbs' . $prev . '" class="info-thumb-link prev"></a>';
    $next++; $prev++;
    $c			= 1;
    for ($i = 0; $i < count($imageSet); $i++):  
      $r			= $imageSet[$i];
      $fid			= $r->fid;
      $status		= $r->image_status;
      
      
      if ($status == 1):
	    $file		= file_load($fid);
	    $image		= image_style_url('info_slide_large', $file->uri);
	    $thumb		= image_style_url('info_slide_thumb', $file->uri); 
	    ?>
	    <?php /*<figure id="image<?php print $n; ?>"><img src="<?php print $image; ?>" alt=""></figure>*/ ?>
	    <?php
		//if ($a == 1) { $next++; $prev++; }
		if ($c == 1) { $class = 'thumb-link first'; } else { $class = 'thumb-link'; }
        $thumbs .= '<a href="#image'.$n.'" rel="image'.$n.'" class="'.$class.'" id="thumb'.$n.'"><img src="'.$thumb.'" alt="" /></a>';
	    $c++;
        $n++;
      endif;
    endfor;
    if ($next > $numThumbSets){
      $thumbs .= '<a href="#thumbs1" id="next-thumbs1" class="info-thumb-link next"></a>';
    } else {
      $thumbs .= '<a href="#thumbs'.$next.'" id="next-thumbs'.$next.'" class="info-thumb-link next"></a>';		
    }
    // $thumbs .= '<a href="#thumbs'.$next.'" id="next-thumbs'.$next.'" class="info-thumb-link next">></a>';
    $thumbs .= '</div>';
    
  endfor;

  $thumbs .= '</div>';
  //$thumbs .= '<a href="#thumbs' .$next. '" id="prev-thumbs' .$next. '" class="info-thumb-link prev"><</a>';
  $thumbnails = $thumbs;
  else:
    $thumbnails = '';
  endif;  
  ?>
    <?php /*</div>  
        <div id="info-slider-pagination"> */ ?>
        <?php //print $thumbnails; ?>
      <?php /* </div>
    </section> */ ?>

  
    <main id="info-description">
      <?php //debug($node->field_info_image, 'info image');
      if ($node->field_info_image) {
	      $info_fid		= $node->field_info_image['und'][0]['fid'];
	      $info_file	= file_load($info_fid);
	      $info_image	= file_create_url($info_file->uri);
	      $img			=  '<img src="' . $info_image . '" alt="" />';
	      print $img;
      }
	      
	      

      ?>
      
      <h2><?php print $node->title; ?></h2>
      <p><?php print $node->body[LANGUAGE_NONE][0]['safe_value']; ?></p>
      <?php if ($node->title === "Why Ascent" || $node->nid === 1) { ?>
          <ul id="team_members">
              <?php $team_sql = db_query("SELECT nid AS nid, type AS type
                  FROM node
                  WHERE type = 'member'")->fetchAll();
              $icount = count($team_sql);
              for ($i = 0; $i < $icount; $i++) {
              $inode = node_load($team_sql[$i]->nid); ?>
              <li>
                  <?php
                  $ifid		= $inode->field_member_image['und'][0]['fid'];
                  $ifile	= file_load($ifid);
                  $iimage	= image_style_url('member_image', $ifile->uri);
                  $img			=  '<img src="' . $iimage . '" alt="" />';
                  print $img ?>
                  <h2><?php print $inode->title; ?></h2>
                  <p><?php print $inode->body['und'][0]['safe_value']; ?></p>
              </li>
              <?php } ?>
          </ul>
      <?php } ?>

      </div>
      
      
    <?php
      // We hide the comments and links now so that we can render them later.
      //hide($content['comments']);
      //hide($content['links']);
      //print render($content);
    ?>
    </main>
  </div>
  <section id="addtional-info">
    <h3>Related Videos</h3>
    <aside id="side-related-videos">
      <span class="top-shadow"></span>
<?php print $info_videos; 
/*
    $oTitle = 'Building an Ascent Home';
    $tTitle = 'Visit Our Model Home';
    $oneB = ctools_modal_text_button(t($oTitle), 'featured-videos/nojs/1', t($oTitle), 'ctools-modal-ctools-sample-style button');
    $one = ctools_modal_text_button(t($oTitle), 'featured-videos/nojs/1', t($oTitle), 'ctools-modal-ctools-sample-style');
    $twoB = ctools_modal_text_button(t($tTitle), 'featured-videos/nojs/2', t($tTitle), 'ctools-modal-ctools-sample-style button');
    $two = ctools_modal_text_button(t($tTitle), 'featured-videos/nojs/2', t($tTitle), 'ctools-modal-ctools-sample-style'); */
?>
      <span class="bottom-shadow"></span>
      <a href="/details-gallery#featured-videos" class="all-videos">See all of our videos <span class="right-arrow"></span></a>
      <div class="cleafix"></div> 
    </aside>
  </section>
  <div class="cleafix"></div>
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
