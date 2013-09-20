<?php global $user; ?>
<header>
  <div id="header-inner">
  <?php if ($logo): ?>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"></a>
  <?php endif; ?>
  <aside id="header-info">262.650.9705</aside>
  <nav>
    <ul>
      <li class="why-ascent"><a href="/why-ascent"><span>Why</span> Ascent</a></li>
      <li class="our-approach"><a href="/our-approach"><span>Our</span> Approach</a></li>
      <li class="feature-homes"><a href="/featured-homes"><span>Featured</span> Homes</a></li>
      <li class="details-gallery"><a href="/details-gallery"><span>Details</span> Gallery</a></li>
      <li class="contact"><?php print $contact_modal; ?></li>
    </ul>
  </nav>
  </div>
</header>
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
    <!-- page end -->
    <section id="addtional-info">
      <h3>Related Videos</h3>
      <aside id="side-related-videos">
        <span class="top-shadow"></span>
        <?php //print $info_videos; ?>
        <span class="bottom-shadow"></span>
        <a href="/details-gallery#featured-videos" class="all-videos">See all of our videos</a>
    </aside>
  </section>
  <div class="cleafix"></div>        
  </div>
</div> <!-- /.container --> 
<footer>
  <div class="footer-container">
    <a href="#" id="mba-footer-tag"></a>
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
    </aside>
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
