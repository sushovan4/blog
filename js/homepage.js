$('document').ready(function( ){

    // $('.slick').slick({
    // 	dots: true,
    // 	arrows: true
    // });

    $('.post.content h1').each(function( ) {
	$(this).attr('href', URLify( $(this).text( ) ) );
    });
    
    // $(".menu .item")
    // 	.click(function() {
    // 	    $('html, body').animate({
    // 		scrollTop: $($(this).attr("href")).offset().top
    // 	    }, 1000);
    // 	});
});

function URLify(string) {
  return string.trim().replace(/\s/g, '%20');
}
