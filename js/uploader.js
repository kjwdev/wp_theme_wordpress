( function($){
	$(document).ready(function(){
		console.log('test');
		$('#uploader').click(function(e){
			e.preventDefault();

			var $el = $(this).parent();
			var uploader = wp.media({
				title : 'Envoyer une image',
				button : {
					text : 'Choisir un fichier'
				},
				multiple : false
			})
			.on('select', function(){
				var selection = uploader.state().get('selection');
				var attachment = selection.first().toJSON();
				console.log(attachment.url);
				$('#logoSite').val(attachment.url);
				$('img', $el).attr('src', attachment.url)
			})
			.open();
		});
	});
})(jQuery)