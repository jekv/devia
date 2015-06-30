$(document).ready(function() {
	
	$('button.newsletter-submit').parent().submit(function() {
		
		var formAction = $(this).attr('action');
		var formData = $(this).serialize();
		
		/* Post Data */
		$.ajax({
			method: "POST",
			url: formAction,
			data: formData
		})
		.done(function( response ) {
			
			/* Put Content */
			$('.modal#newsletter .modal-body').html(response);
			
			/* Remove Style */
			$('.modal#newsletter .modal-body').find('style').remove();
			/* Get and Remove Title */
			var title = $('.modal .modal-body').find('h1').html();
			$('.modal#newsletter .modal-body').find('h1').remove();
			$('.modal#newsletter .modal-title').html(title);
			
			$('.modal#newsletter').modal('show');
		});
		
		return false;
	})
});