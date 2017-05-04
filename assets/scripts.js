
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-82908020-1', 'auto');
ga('send', 'pageview');



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
