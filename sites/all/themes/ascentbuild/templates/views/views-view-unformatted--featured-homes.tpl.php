<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

/*
featured-homes
homes-in-progress-details
*/

?>
<?php if (!empty($title)): ?>
  <h1 class="title"><?php print $title; ?></h3>
<main id="<?php print($title == 'Featured Homes' ? 'featured-homes' : 'homes-in-progress-details'); ?>">
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <article<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </article>
<?php endforeach; ?>

<?php if (!empty($title)): ?>
</main>
<?php endif; ?>
