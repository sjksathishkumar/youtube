 $(document).ready( function() {
       $('#myCarousel').carousel({
		pause: true,
        interval: false
	   });
	
	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
});

     
          //faq accordion
        
                    $('.collapse').on('shown.bs.collapse', function(){ 
                                    $('.panel-heading').removeClass('panel_active');
                                    $(this).parent().find(".fa-plus-circle").removeClass("fa-plus-circle").addClass("fa-minus-circle");
                                    $(this).parent().find('.panel-heading').addClass('panel_active');
                      }).on('hidden.bs.collapse', function(){
	                   $('.panel-heading').removeClass('panel_active');
                           $(this).parent().find(".fa-minus-circle").removeClass("fa-minus-circle").addClass("fa-plus-circle");
//$(this).parent().find('.panel-heading').addClass('panel_active');
                         });
            

     $('#faq-from').on('click', function(e) {
         
       var searchdata =  $("#searchfaq-question").val();
       
       $.ajax({
            url: 'searchfaq',
            data: 'question='+searchdata,
            success: function(data) {
               
                if($.trim(data) ==''){
                    var mesage = 'No result found!';
                 $('#accordion').html(mesage);  
                }else{
                 $('#accordion').html(data);
                }
            }
    });
});


