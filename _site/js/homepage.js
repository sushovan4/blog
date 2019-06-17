$('document').ready(function( ){
    $('.ui.dropdown').dropdown( );

    $('.slick').slick({
	dots: true,
	arrows: true
    });

    $('.post-card').each(function( ){
	$(this).css('background-image', 'url(/assets/'+ $(this).data('background') + ')');
	
    });
    
    // $(".menu .item")
    // 	.click(function() {
    // 	    $('html, body').animate({
    // 		scrollTop: $($(this).attr("href")).offset().top
    // 	    }, 1000);
    // 	});
});
