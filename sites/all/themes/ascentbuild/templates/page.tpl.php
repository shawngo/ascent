<?php global $user; ?>
<header>
  <div id="header-inner">
  <?php if ($logo): ?>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"></a>
  <?php endif; ?>
  <?php /* <aside id="header-info">262.650.9705</aside> */ ?>
  <aside id="header-info"><span class="phone">262.650.9705</span> <span class="houzz"><a href="http://www.houzz.com/pro/ascent/ascent-llc" target="_blank">Visit us on Houzz</a></aside>
  <nav>
    <ul>
      <li class="why-ascent"><a href="/why-ascent" <?php 
          if (url(current_path()) === '/why-ascent') {
            echo 'class="active"';
          }
        ?>><span>Why</span> Ascent</a></li>
      <li class="our-approach"><a href="/our-approach" <?php 
          if (url(current_path()) === '/our-approach') {
            echo 'class="active"';
          }
        ?>><span>Our</span> Approach</a></li>
      <li class="feature-homes"><a href="/featured-homes" <?php 
          if (url(current_path()) === '/featured-homes') {
            echo 'class="active"';
          }
        ?>><span>Featured</span> Homes</a></li>
      <li class="details-gallery"><a href="/details-gallery" <?php 
          if (url(current_path()) === '/details-gallery') {
            echo 'class="active"';
          }
        ?>><span>Details</span> Gallery</a></li>
      <li class="contact"><?php print $contact_modal; ?></li>
    </ul>
  </nav>
  </div>
</header>

  <?php if ($is_front): ?>  
<div id="wrap" class="home">
  <div class="container">
  <section id="home-slider">
    <section class="home-slider-container">
      <?php print $home_slide; ?>
    </section>
    <aside id="home-slider-pagination">
      <?php print $slide_links; ?>
    </aside>
  </section>
  <div class="video-links-wrapper">
    <section id="feature-videos">
      <?php print $featured_videos; ?>
    </section>
    <aside id="helpful-links">
      <h3>Helpful Links</h3>
      <ul class="home-links">
        <li class="top-shadow"><a href="/featured-homes">Featured Homes of <?php print date('Y'); ?></a></li>
        <li class="middle"><a href="/featured-homes#homes-in-progress-details">Homes in Progress</a></li>
        <li class="bottom-shadow"><a href="http://www.houzz.com/pro/ascent/ascent-llc">Visit us on Houzz</a></li>      	    
      </ul>
    </aside>      
    <div class="clearfix"></div>
  </div>
  
  <section id="welcome-to-ascent">
    <h2>Welcome to Ascent Custom Homes</h2>
    <p>Ascent Custom Homes specializes in beautiful custom homes unique to each owner's discerning taste and particular requirements. That means no templates and no mass-produced designs. With our team approach to home building, Ascent coaches you through the process, assists in matching you with an architect that shares your sensibilities, and provides hands-on supervision throughout. When you work with Ascent, you can expect thoughtful design and building solutions because, whatever your lifestyle, the beauty is in the details!</p>
    <a href="/featured-homes" class="featured-homes"><span>Experience our featured homes ></span></a>
  </section>
  </div>
</div> <!-- /.container --> 
  <?php else: ?>
<div id="wrap">
  <div class="container">
            <?php if ($messages): ?>
                <div id="messages">
                <?php print $messages; ?>
                </div><!-- /#messages -->
            <?php endif; ?>  
  
    <?php if ($title): ?>
    <h1 class="title" id="page-title"><?php print $title; ?></h1>
    <?php endif; ?>  
    <!-- page begin -->
    <?php print render($page['content']); ?>
    <?php print render($content_bottom); ?>
    <!-- page end -->
  </div>
</div> <!-- /.container --> 
<?php endif; ?>	



<footer>
  <div class="footer-container">
    <a href="#" id="mba-footer-tag"></a>
    <?php /*
    <aside id="footer-menu-one">
      <?php if ($page['footer_first']): ?><?php print render($page['footer_first']); ?><?php endif; ?>
    </aside>
    <aside id="footer-menu-two">
      <?php if ($page['footer_second']): ?><?php print render($page['footer_second']); ?><?php endif; ?>
    </aside>
    <aside id="footer-menu-three">
      <?php if ($page['footer_third']): ?><?php print render($page['footer_third']); ?><?php endif; ?>
    </aside>
    <aside id="footer-menu-four">
      <?php if ($page['footer_fourth']): ?><?php print render($page['footer_fourth']); ?><?php endif; ?>
    </aside> */ ?>
    <nav id="footer-menu">
      <ul>
        <li class="why-ascent"><a href="/why-ascent" <?php 
          if (url(current_path()) === '/why-ascent') {
            echo 'class="active"';
          }
        ?>><span>Why</span> Ascent</a></li>
        <li class="our-approach"><a href="/our-approach" <?php 
          if (url(current_path()) === '/our-approach') {
            echo 'class="active"';
          }
        ?>><span>Our</span> Approach</a></li>
        <li class="feature-homes"><a href="/featured-homes" <?php 
          if (url(current_path()) === '/featured-homes') {
            echo 'class="active"';
          }
        ?>><span>Featured</span> Homes</a></li>
        <li class="details-gallery"><a href="/details-gallery" <?php 
          if (url(current_path()) === '/details-gallery') {
            echo 'class="active"';
          }
        ?>><span>Details</span> Gallery</a></li>
      </ul>
    </nav>
    <address id="footer-address">
      <div class="footer-social-icons">
        <a href="https://www.facebook.com/pages/Ascent-LLC/540757675946531" class="facebook"></a>
        <a href="http://www.houzz.com/pro/ascent/ascent-llc" class="houzz"></a>
      </div>
    <p>W240 N1221 Pewaukee Rd.<br />
    Waukesha, WI 53188<br />
    262.650.9705 | <a href="mailto:pat@ascentbuild.com" class="email">pat@ascentbuild.com</a></p>
      <?php //if ($page['footer_address']): ?><?php //print render($page['footer_address']); ?><?php //endif; ?>  
    </address>
    <a href="/" class="footer-logo" title="Ascent Custom Homes"></a>
    <!-- <div class="clear"></div> !-->
      <?php if ($page['footer']): print render($page['footer']); endif; ?>
    <!-- <div class="clear"></div> !-->
  </div>
</footer>
    
<?php
 //if ($user->uid == 1){ 
	// print '<pre>';
//	 print_r(get_defined_vars());
  //  print '</pre>';
  //}
?>    
