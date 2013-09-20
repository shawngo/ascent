<header>
  <div id="header-inner">
  <?php if ($logo): ?>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"></a>
  <?php endif; ?>
  <aside id="header-info"></aside>
  <nav>
    <ul>
      <li><a href="#"><span>Why</span> Ascent</a></li>
      <li><a href="#"><span>Our</span> Approach</a></li>
      <li><a href="#"><span>Featured</span> Homes</a></li>
      <li><a href="#" class="active"><span>Details</span> Gallery</a></li>
    </ul>
  </nav>
  </div>
</header>

  <?php if ($is_front): ?>  
<div id="wrap" class="home">
  <div class="container">


  <section id="home-slider">

  </section>
  
  <section id="feature-videos">
    <h2>Featured Videos</h2>
    <article id="video-one">
      <img src="/sites/all/themes/ascentbuild/images/video-1.jpg" alt="Building an Ascent Home" id="featured-video-one" />
      <caption>07.23.13</caption>
      <figcaption><a href="#" >Building an Ascent Home</a></figcaption>
    </article>
    <article id="video-two">
      <img src="/sites/all/themes/ascentbuild/images/video-1.jpg" alt="Visit Our Model Home" id="featured-video-two" />
      <span>07.23.13</span>
      <figcaption><a href="#" >Visit Our Model Home</a></figcaption>
    </article>    
  </section>
  <aside id="helpful-links">
    <h3>Helpful Links</h3>
    <ul>
      <li>Featured Home of 2012</li>
      <li>Homes in Progress</li>
      <li>Our Model Home</li>      	    
    </ul>
  </aside>
  
  <section id="welcome-to-ascent">
    <h2>Welcome to Ascent Custom Homes</h2>
    <p>Ascent Building Solutions specializes in beautiful custom homes unique to each owner’s discerning taste and particular requirements. 
    That means no templates and no mass-produced designs. With our team approach to home building, Ascent coaches you through the process, 
    matching you with an architect that shares your sensibilities and providing hands-on supervision throughout.</p>
    <a href="#" class="featured-homes">Experience our featured homes</a>
  </section>
  </div>
</div> <!-- /.container --> 
  <?php else: ?>
<div id="wrap">
  <div class="container">


  <section id="home-slider">

  </section>
  
  <section id="feature-videos">
    <h2>Featured Videos</h2>
    <article id="video-one">
      <img src="/sites/all/themes/ascentbuild/images/video-1.jpg" alt="Building an Ascent Home" id="featured-video-one" />
      <caption>07.23.13</caption>
      <figcaption><a href="#" >Building an Ascent Home</a></figcaption>
    </article>
    <article id="video-two">
      <img src="/sites/all/themes/ascentbuild/images/video-1.jpg" alt="Visit Our Model Home" id="featured-video-two" />
      <caption>07.23.13</caption>
      <figcaption><a href="#" >Visit Our Model Home</a></figcaption>
    </article>    
  </section>
  <aside id="helpful-links">
    <ul>
      <li>Featured Home of 2012</li>
      <li>Homes in Progress</li>
      <li>Our Model Home</li>      	    
    </ul>
  </aside>
  
  <section id="welcome-to-ascent">
    <h2>Welcome to Ascent Custom Homes</h2>
    <p>Ascent Building Solutions specializes in beautiful custom homes unique to each owner’s discerning taste and particular requirements. 
    That means no templates and no mass-produced designs. With our team approach to home building, Ascent coaches you through the process, 
    matching you with an architect that shares your sensibilities and providing hands-on supervision throughout.</p>
    <a href="#" class="featured-homes">Experience our featured homes</a>
  </section>
  </div>
</div> <!-- /.container --> 
<?php endif; ?>	
	


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
    <p>W240 N1221 Pewaukee Rd.<br />Waukesha, WI 53188<br />262.650.9705  |  <a href="" class="email">Email</a></p>
      <?php //if ($page['footer_address']): ?><?php //print render($page['footer_address']); ?><?php //endif; ?>  
    </address>
    <!-- <div class="clear"></div> !-->
      <?php if ($page['footer']): print render($page['footer']); endif; ?>
    <!-- <div class="clear"></div> !-->
  </div>
</footer>
    
