/*
*
*  name: baseMotheds
*  author: tonney
*  date: 2018/01/10 10:30
*  WebSite: www.duoguyu.com
*  Last: 2018/04/02/tonney.
*
*/


$(function(){
    baseMotheds.init();
});

// baseMotheds
var baseMotheds = function(){
    // scrollHead
    var scrollHead = function(){
        var headGroup = $('#headGroup').height();
        var headFullTabs = $('#headFullTabs').height();
        var sroll = headGroup-headFullTabs;
        $(window).bind("scroll resize", function() {
        	if ($(window).scrollTop() > sroll) {
        		$('#headFullTabs').addClass('index');
        		$('#indexGroup').css('padding-top','50px');
        	}else{
        		$('#headFullTabs').removeClass('index');
        		$('#indexGroup').css('padding-top','0');
        	}
        });
    };
    // scrollTop
    var scrollTop = function(){
    	var offset = 300,
    		offset_opacity = 1200,
    		scroll_top_duration = 700,
    		$back_to_top = $('.cd-top');
    	$(window).scroll(function(){
    		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
    		if( $(this).scrollTop() > offset_opacity ) { 
    			$back_to_top.addClass('cd-fade-out');
    		}
    	});
    	$back_to_top.on('click', function(event){
    		event.preventDefault();
    		$('body,html').animate({scrollTop: 0 }, scroll_top_duration);
    	});
    };
    return{
        init: function(){
            scrollHead();
            scrollTop();
        }
    }
}();

