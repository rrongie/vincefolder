
$(document).on('click','sul > li > a', function(){


	 $(this).parent().each(function(){
        $(this).removeClass('active');
    });


	$(this).parent().addClass('active');


});