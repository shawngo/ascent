<?php
/**
 * @param <array> $featured_homes
 *   images, title, description 
 * 
 */
?>

<?php //if ($featured_videos): ?>
  <?php 
  for ($i = 0, $n = 1; $i < count($featured_videos); $i++, $n++): 
  $rec = $featured_videos[$i]; ?>
  <article id="video-<?php print $n; ?>">
    <?php print $rec['button']; ?>
    <img src="<?php print $rec['image']; ?>" alt="<?php print $rec['title']; ?>" title="<?php print $rec['title']; ?>" id="featured-video-<?php print $n; ?>" />
    <span>07.23.13</span>
    <figcaption><?php print $rec['url']; ?></figcaption>
  </article> 
  <?php endfor; ?>
<?php //endif; ?>