$(document).ready(function()
{   
    
    
    $('#prisers .priser1').css({'margin-top': '-1000px'});
    $('#prisers .priser2').css({'margin-top': '-1000px'});
    $('#prisers .priser3').css({'margin-top': '-1000px'});
    //$('h1').css({'opacity': '0'});
    
    //setTimeout(function () {$('h1').animate({'opacity': '1'},1000);},3000);
    $('#prisers .priser1').animate({'margin-top': '5px'}, 1000).animate({'margin-top': '0px'},1000);
    $('#prisers .priser2').animate({'margin-top': '-58px'}, 2000).animate({'margin-top': '-63px'},1000);
    $('#prisers .priser3').animate({'margin-top': '-181px'}, 3000).animate({'margin-top': '-186px'},1000);
    
    var k1 = 0;
   var k2 = 0;
   var k3 = 0;
    
    $(".box_skitter_large").skitter({
			animation: "random", 
 			dots: true, 
 			width_label: '900px',
                        height_label: '110px',
                        preview: true, 
 			hideTools: true
		});
    $('#bgmplayer').css('height', screen.height);
    fb();
    $('#bod a:not(.logout-link,.login-link,.login_link,[id*="login_link"],[href*="#"],[target="_blank"],'
      +'[href$="mp3"],[href$="jpg"],[href$="JPG"],[href$="jpeg"],[href$="JPEG"],[href$="GIF"]m[href$="gif"],[href$="PNG"],[href$="png"],[href$="doc"],[href$="pdf"])')
   .pjax('#content', {timeout: 0});
    
    $('#bod')
  .on('pjax:start', function() { $('.loader').fadeIn(300) })
  .on('pjax:end',   function() { 
      $('.loader').fadeOut(300); 
      $('#prisers .priser1 .img-kubok img').css({opacity: 0.0});
      $('#prisers .priser1 .img-kubok img:first').css({opacity: 1.0});
      $('#prisers .priser2 .img-kubok img').css({opacity: 0.0});
      $('#prisers .priser2 .img-kubok img:first').css({opacity: 1.0});
      $('#prisers .priser3 .img-kubok img').css({opacity: 0.0});
      $('#prisers .priser3 .img-kubok img:first').css({opacity: 1.0});
      $('#prisers .priser1 .img-kubok img').removeClass('show');
      $('#prisers .priser2 .img-kubok img').removeClass('show');
      $('#prisers .priser3 .img-kubok img').removeClass('show');
      $('#prisers .priser1 .name-priz').css({opacity: 0.0});
      $('#prisers .priser2 .name-priz').css({opacity: 0.0});
      $('#prisers .priser3 .name-priz').css({opacity: 0.0});
      $('#prisers .priser1 .mesto').css({opacity: 0.0});
      $('#prisers .priser2 .mesto').css({opacity: 0.0});
      $('#prisers .priser3 .mesto').css({opacity: 0.0});
        k1 = 0;
        k2 = 0;
        k3 = 0;
      fb();
      if($(".box_skitter_large").find(".container_skitter").length == 0)
          {
      $(".box_skitter_large").skitter({
			animation: "random", 
 			dots: true, 
 			width_label: '900px',
                        height_label: '205px',
                        preview: true, 
 			hideTools: true
		});
            }
            else
                {
                    $('.box_skitter .prev_button').remove();
                    $('.box_skitter .next_button').remove();
                    $('.box_skitter .info_slide_dots').remove();
                    $('.box_skitter .container_skitter').remove();
                    
                    $(".box_skitter_large").skitter({
			animation: "random", 
 			dots: true, 
 			width_label: '900px',
                        height_label: '205px',
                        preview: true, 
 			hideTools: true
                    });
                }
            
  });
   
   $('#bod form:not(.anketa_form, .poll-form)').live('submit',function(a){

     // display loading message
      $('#loading-shade').show();

      if( !$(a.target).attr('action'))
         a.target = $(a.target).closest('form');

      data = $(a.target).serialize();

      cont = $('#content');

      $.ajax({
         type: "POST",
         url: $(a.target).attr('action'),
         data: data,
         beforeSend : function(xhr) {
            return xhr.setRequestHeader('X-PJAX','true'); // IMPORTANT
         },
         success: function(msg){
            cont.html(msg);
            $('#loading-shade').hide();
         },
         error: function(a,b,c) {
            $('#loading-shade').hide();
         }
      });

      a.preventDefault();
      return false;
   });
   function fb(){
   $("a[rel=group]").fancybox({
		        'transitionIn'	: 'transition',
		        'transitionOut'	: 'transition',
		        'titlePosition' 	: 'over',
		        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
		            return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
		        }
	        });

            $("a[href$='.jpg']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
             $("a[href$='.JPG']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
            $("a[href$='.gif']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
            $("a[href$='.GIF']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
            $("a[href$='.bmp']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
            $("a[href$='.BMP']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
            $("a[href$='.png']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});
            $("a[href$='.PNG']").fancybox({
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
                'titlePosition'	: 'over'
			});

			$("a[rel^='video']").fancybox({
				'width'				: '560px',
				'height'			: '340px',
				'autoScale'			: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'type'				: 'iframe',
                 'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});
            
            $("a[id^='iframe']").fancybox({
				'width'				: '1024px',
				'height'			: '768px',
				'autoScale'			: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'type'				: 'iframe'
			});
        
            
            $("#inline_paper").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'	: 'transition',
		'transitionOut'	: 'transition',
         'overlayColor'		: '#000',
		 'overlayOpacity'	: 0.9
            });
}


    function theRotator() {
      
      $('#prisers .priser1 .img-kubok img').css({opacity: 0.0});
      $('#prisers .priser1 .img-kubok img:first').css({opacity: 1.0});
      $('#prisers .priser2 .img-kubok img').css({opacity: 0.0});
      $('#prisers .priser2 .img-kubok img:first').css({opacity: 1.0});
      $('#prisers .priser3 .img-kubok img').css({opacity: 0.0});
      $('#prisers .priser3 .img-kubok img:first').css({opacity: 1.0});
      $('#prisers .priser1 .name-priz').css({opacity: 0.0});
      $('#prisers .priser2 .name-priz').css({opacity: 0.0});
      $('#prisers .priser3 .name-priz').css({opacity: 0.0});
      rotate();
      rotate2();
      rotate3();
    }
   
    function rotate() {  
      var current = ($('#prisers .priser1 .img-kubok img.show')? $('#prisers .priser1 .img-kubok img.show') : $('#prisers .priser1 .img-kubok img:first'));
      var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('#prisers .priser1 .img-kubok img:first') :current.next()) : $('#prisers .priser1 .img-kubok img:first'));  
      
      next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);
      current.animate({opacity: 0.0}, 1000).removeClass('show');
      if(k1==1)
          {
              $('#prisers .priser1 .name-priz').animate({opacity: 1.0},1000);
              $('#prisers .priser1 .mesto').animate({opacity: 0.0},1000);
              k1=0;
          }
          else{
              $('#prisers .priser1 .name-priz').animate({opacity: 0.0},1000);
              $('#prisers .priser1 .mesto').animate({opacity: 1.0},1000);
              k1=1;
          }
      
      setTimeout(rotate,5500);
    };
    
    function rotate2() {  
      var current = ($('#prisers .priser2 .img-kubok img.show')? $('#prisers .priser2 .img-kubok img.show') : $('#prisers .priser2 .img-kubok img:first'));
      var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('#prisers .priser2 .img-kubok img:first') :current.next()) : $('#prisers .priser2 .img-kubok img:first'));  
      
      next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);
      current.animate({opacity: 0.0}, 1000).removeClass('show');
      
      if(k2==1)
          {
              $('#prisers .priser2 .name-priz').animate({opacity: 1.0},1000);
              $('#prisers .priser2 .mesto').animate({opacity: 0.0},1000);
              k2=0;
          }
          else{
              $('#prisers .priser2 .name-priz').animate({opacity: 0.0},1000);
              $('#prisers .priser2 .mesto').animate({opacity: 1.0},1000);
              k2=1;
          }
      
      setTimeout(rotate2,6000);
    };
    
    function rotate3() {  
      var current = ($('#prisers .priser3 .img-kubok img.show')? $('#prisers .priser3 .img-kubok img.show') : $('#prisers .priser3 .img-kubok img:first'));
      var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('#prisers .priser3 .img-kubok img:first') :current.next()) : $('#prisers .priser3 .img-kubok img:first'));  
      
      next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);
      current.animate({opacity: 0.0}, 1000).removeClass('show');
      
      if(k3==1)
          {
              $('#prisers .priser3 .name-priz').animate({opacity: 1.0},1000);
              $('#prisers .priser3 .mesto').animate({opacity: 0.0},1000);
              k3=0;
          }
          else{
              $('#prisers .priser3 .name-priz').animate({opacity: 0.0},1000);
              $('#prisers .priser3 .mesto').animate({opacity: 1.0},1000);
              k3=1;
          }
      
      setTimeout(rotate3,6500);
    };

      theRotator();

});


