(function($){
  $(document).ready(function(){
    // Set if slider pagination is clicked.
    slider_clicked = false;
    // Only fire homepage sliders on homepage.
    is_front = $('body').hasClass('front');
    // Variable to hold the interval.
    slider_interval = null;
    // Pager element.
    $slider_pager = $('#home-slider .slide-link.next');
    // Number of slides iterated.
    slide_counter = 1;
    // Total number of slides.
    num_slides = $('.home-slider-container figure').length;

    // setInterval callback to advance slides.
    slide_slider = function () {
      if (!slider_clicked && slide_counter <= num_slides) {
        slide_counter++;
        home_slide_link_slide(false);
      }
    }
    // Initiate auto slider.
    if (is_front) {
      slider_interval = setInterval(slide_slider, 3000);
    }
    
    // Callback for slider pager click.
    $('a.slide-link').click(home_slide_link_slide);

    function home_slide_link_slide(e) {
      if (e) {
        clearInterval(window.slider_interval);
        window.slider_clicked = true;
        var href = $(this).attr('href');
        var imgId = $(this).attr('rel');
      }
      else {
        var href = '#home' + (slide_counter > num_slides ? '1' : slide_counter);
        var imgId = '#home' + (slide_counter > num_slides ? '1' : slide_counter);
      }

      // $('figure[id!="'+$(href)+'"]').css('left', '-1035px');
      // animate({left: "-1035px",},{ duration: 1000, queue: false });
      $("figure[id!='"+imgId+"']").removeClass('active').addClass('inactive');
      $('#home-slider-pagination [href!='+href+']').removeClass('active').addClass('inactive');
      $("#home-slider-pagination [href*='"+href+"']").removeClass('inactive').addClass('active');
      //$(href).addClass('active').animate({left: "0px",},{ duration: 250, queue: false });
      $(href).addClass('active').removeClass('inactive');
      // $(href).css('left', '0px');
      return false;
      e.preventDefault();
    }

    $('#home-slider-pagination a').live('click', home_slider_paginate);
    $('#home-slider-pagination a').live('click', function() {slider_clicked = true;});

    function home_slider_paginate(ev) {
      var href = $(this).attr('href');
      var imgId = $(this).attr('rel');
      $(this).siblings().removeClass('active').addClass('inactive');
      $(this).removeClass('inactive').addClass('active');
      // $(this).addClass('active');
      // $('figure[id!="'+$(href)+'"]').css('left', '-1035px');
      // $("figure[id!='"+imgId+"']").animate({left: "-1035px",},{ duration: 500, queue: false });
      $("figure[id!='"+imgId+"']").removeClass('active');
      // $(href).addClass('active').animate({left: "0px",},{ duration: 250, queue: false });
      $(href).addClass('active').removeClass('inactive');
      // $(href).css('left', '0px');
      return false;
      ev.preventDefault();
    }

    //$('#home-slider-pagination a').first().trigger('click');
    $('#info-slider-pagination a.info-thumb-link').live('click', function(it){
      var href = $(this).attr('href');
      $('div.thumbs[id!="'+$(href)+'"]').css('left', '-679px');
      $(href).addClass('active').animate({left: "0px",},{ duration: 250, queue: false });
      return false;
      it.preventDefault();
    });
    $('#info-slider-pagination a.thumb-link').live('click', function(ii){
      var href = $(this).attr('href');
      var imgId = $(this).attr('rel');
      $("figure[id!='"+imgId+"']").removeClass('active').addClass('inactive');
      $(href).addClass('active').removeClass('inactive');
      // $('#info-slider figure[id!="'+$(href)+'"]').css('left', '-679px');
      // $(href).addClass('active').animate({left: "0px",},{ duration: 250, queue: false });
      return false;
      ii.preventDefault();
    });
	  
    $('#home-details-slider a.thumb-link').live('click', function(hs){
      var href = $(this).attr('href');
      $('#home-details-slider figure[id!="'+$(href)+'"]').css('left', '-990px');
      $(href).addClass('active').animate({left: "0px",},{ duration: 250, queue: false });
      return false;
      hs.preventDefault();
    });  			
  });
})(jQuery);
