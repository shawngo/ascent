<?php
/**
 * @param <array> $featured_homes
 *   images, title, description 
 * 
 */

?>

<?php if ($featured_homes): ?>

<section id="featured-homes-gallery">
  <?php for ($i = 0; $i < count($featured_homes); $i++): $home = $featured_homes[$i]; ?>
  <article>
    <img src="<?php print $home['image']; ?>" border="0" />  
    <h2><?php print $home['title']; ?></h2>
  </article>  
  <?php endfor; ?>
</section>
<?php endif; ?>

<h1 title="featured-videos" id="featured-videos"><span>Featured Videos</span></h1>
<section id="featured-videos-gallery">
<?php 
  for ($i = 0, $n = 1; $i < count($featured_videos); $i++, $n++): 
  $rec = $featured_videos[$i]; ?>
  <article id="video-<?php print $n; ?>">
    <?php print $rec['button']; ?>
    <img src="<?php print $rec['image']; ?>" alt="<?php print $rec['title']; ?>" title="<?php print $rec['title']; ?>" id="featured-video-<?php print $n; ?>" />
    <h2><?php print $rec['title']; ?></h2>
  </article> 
<?php endfor; ?>
</section>