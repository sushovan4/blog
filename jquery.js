jQuery(function ($) {
      var $el = $('#scrolling'),
	  top = $el.offset().top;
      print("Hi");

    $(window).scroll(function () {
    	var pos = $(window).scrollTop();
	if(pos > top  && !$el.hasClass('fixed')) {
	    $el.addClass('fixed');
	} else if (pos < top  && $el.hasClass('fixed')) {
	    $el.removeClass('fixed');
	}
	
    });
    
});

