$(document).ready(function(){

	window.setTimeout(function(){
		$(".loading").fadeOut(500)
	},400)
	
	$('.header_navbar ul li').hover(function(){

		$(this).find('.header_slider').stop().slideDown(200);
	},function(){
		$(this).find('.header_slider').stop().slideUp(200);
	});

	$('.navicon').click(function(){
		$('.header_navbar').stop().slideToggle(100);
	});
	$(document).click(function() {
		$('.sousuobtn').removeClass('active');
	});
	$('.sousuobtn').click(function(e){
		e?e.stopPropagation():event.cancelBubble = true;
		$(this).addClass('active');
		$(".sousuobtn input").focus();
	});
	



// !!!!!~~~~~~~~~~~~~~PC~~~~~~~~~!!!!!
	function IsPC() {
        var userAgentInfo = navigator.userAgent;
        var Agents = ["Android", "iPhone",
                    "SymbianOS", "Windows Phone",
                    "iPad", "iPod"];
        var flag = true;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) {
                flag = false;
                break;
            }
        }
        return flag;
    };
  $(document).ready(function(){
        var isPC=IsPC();
        if(isPC){
        	 var header_hg=$('.header_bar.a9').height();
  			$('.bodyhomes_a9').css('padding-top',header_hg);

	      }
        else{
        	 var header_hg=$('.header_bar.a9').height();
  			$('.bodyhomes_a9').css('padding-top',header_hg);
           $(function(){
              var width = 0;
              for (let i = 0; i < $('.Gslistnav ul li').length; i++) {
                  width += $('.Gslistnav ul li').eq(i).outerWidth(true);
              }
              $('.Gslistnav ul').width(width);

    			})

           
           
        }
    });
  // ~~~~~~~~~~~~~//

	  $('.Gslistnav ul li').click(function(){
	  	var len_1=$(this).index();
		var len_2=$(this).parents('.Gyfullpages').find('.Gstitle_bar .Gstitle').index();
		var len_3=$(this).parents('.Gyfullpages').find('.Gslistnav_huan .Gslistnav_items').index();
		len_3=len_2=len_1;
		$(this).addClass('active').siblings().removeClass('active');
		$(this).parents('.Gyfullpages').find('.Gstitle_bar .Gstitle').eq(len_2).addClass('active').siblings().removeClass('active');
		$(this).parents('.Gyfullpages').find('.Gslistnav_huan .Gslistnav_items').eq(len_3).addClass('active').siblings().removeClass('active');

	  });



})