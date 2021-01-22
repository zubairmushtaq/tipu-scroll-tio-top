(function($){
	$(window).scroll(function(){
		
        if ($(this).scrollTop() < 100) {
			$('#stt_container') .fadeOut();
        } else {
			$('#stt_container') .fadeIn();
        }
    });
	$('#stt_container').click(function(){
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
		});

})( jQuery );