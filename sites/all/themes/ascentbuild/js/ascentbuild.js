(function($){
  $(document).ready(function(){
    
    $('a.slide-link').click(function (e){
      var href = $(this).attr('href');
		var imgId = $(this).attr('rel');
      // $('figure[id!="'+$(href)+'"]').css('left', '-1035px');
      // animate({left: "-1035px",},{ duration: 1000, queue: false });
      $("figure[id!='"+imgId+"']").removeClass('active').addClass('inactive');
      $('#home-slider-pagination [href!='+href+']').removeClass('active').addClass('inactive');
      console.log(href);
      $("#home-slider-pagination [href*='"+href+"']").removeClass('inactive').addClass('active');
      //$(href).addClass('active').animate({left: "0px",},{ duration: 250, queue: false });
      $(href).addClass('active').removeClass('inactive');
      // $(href).css('left', '0px');
      return false;
      e.preventDefault();
    });
    $('#home-slider-pagination a').live('click', function(ev){
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
    });
    $('#home-slider-pagination a').first().trigger('click');
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
