/* This is my script file */
/* Sushovan Majhi */

function topFunc( ) {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop  = 0;
    }

$(document).ready(
    function() {
	var docHeight = $(document).height(),
	    scrollPercent;
	
	$(window).scroll(function() {
	    scrollPercent = ($(window).scrollTop() / docHeight) * 100;
	    
	    $('.scroll-progress').width(scrollPercent + '%');
	});
    });

$(document).ready(function() {
    var docHeight = $(document).height(),
	windowHeight = $(window).height(),
	scrollPercent;
    
    $(window).scroll(function() {
	scrollPercent = $(window).scrollTop() / (docHeight - windowHeight) * 100;
	
	$('.scroll-progress').width(scrollPercent + '%');
    });
});


$(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
	// Make sure this.hash has a value before overriding default behavior
	if (this.hash !== "") {
	    // Prevent default anchor click behavior
	    event.preventDefault();
	    
	    // Store hash
		var hash = this.hash;
	    
	    // Using jQuery's animate() method to add smooth page scroll
	    // The optional number (900) specifies the number of milliseconds it
	    //takes too scroll to the specified area

	    $('html, body').animate({
		scrollTop: $(hash).offset().top
	    }, 900, function(){
		
		// Add hash (#) to URL when done scrolling (default click behavior)
		window.location.hash = hash;
	    });
	} // End if
    });
    
    $(window).scroll(function() {
	$(".slideanim").each(function(){
	    var pos = $(this).offset().top;
	    
	    var winTop = $(window).scrollTop();
	    if (pos < winTop + 600) {
		$(this).addClass("slide");
	    }
	});
    });
})
