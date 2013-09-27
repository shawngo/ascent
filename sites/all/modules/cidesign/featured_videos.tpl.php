<?php
/**
 * @param <array> $featured_homes
 *   images, title, description 
 * 
 */
?>
<?php //if ($featured_videos): ?>
  <?php for ($i = 0, $n = 1; $i < count($featured_videos); $i++, $n++): 
  $rec = $featured_videos[$i];
  $ref = node_load($rec['nid']);
  $link_ref = $ref->field_page_reference[LANGUAGE_NONE][0]['nid']; ?>
  <article id="video-<?php print $n; ?>">
    <?php /* print $rec['button']; */ ?>
    <a href="<?php print url('node/' . $link_ref); ?>">
      <img src="<?php print $rec['image']; ?>" alt="<?php print $rec['title']; ?>" title="<?php print $rec['title']; ?>" id="featured-video-<?php print $n; ?>" />
    </a>
    <figcaption><?php print l($rec['title'], 'node/' . $link_ref); ?></figcaption>
  </article> 
  <?php endfor; ?>
<?php //endif; ?>
