<?php
/**
 * @param <array> $featured_homes
 *   images, title, description 
 * 
 */
?>

<?php if ($featured_homes && !is_null($featured_homes)): ?>
<main id="featured-homes">
  <?php for ($i = 0; $i < count($featured_homes); $i++): $home = $featured_homes[$i]; ?>
  <article>
    <img src="<?php print $home['image']; ?>" border="0" />  
    <h2><?php print $home['title']; ?></h2>
    <a href="/node/<?php print $home['nid']; ?>" class="featured-home-details"><span>></span></a>
    <p class="desc"><?php print $home['desc']; ?></p>
  </article>  
  <?php endfor; ?>
</main>
<?php endif; ?>

<?php if ($homes_in_progress): ?>
  <h1 id="homes-in-progress">Homes In Progress</h1>
  <section id="homes-in-progress-details">
  <?php for ($i = 0; $i < count($homes_in_progress); $i++): $home = $homes_in_progress[$i]; ?>  
    
  <article>
    <img src="<?php print $home['image']; ?>" border="0" />  
    <h2><?php print $home['title']; ?></h2>
    <a href="/node/<?php print $home['nid']; ?>" class="featured-home-details"><span>></span></a>
    <p><?php print $home['desc']; ?></p>
  </article>  
  <?php endfor; ?>
</section>
<?php endif; ?>