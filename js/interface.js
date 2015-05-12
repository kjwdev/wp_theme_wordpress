function htmlTicket(article)
{
	var html='';
	$.each(article, function(index, value){
		if(value.aff===true){
			var typeTicket = '';
			$.each(value.type, function(index, value){
				typeTicket += 'type-'+value;
			});
			html+='<div class="ticket size-3 '+typeTicket+'" id="op-ticket-'+value.id+'">';
				html+='<div class="option-ticket">';
					html+='<ul>';
						html+='<li><a href="#" class="big-ticket">big</a></li>';
						html+='<li>l</li>';
						html+='<li><a href="#" class="small-ticket">small</a></li>';
					html+='</ul>';
				html+='</div>';
				html+='<div class="zone-ticket" id="op-ticket-'+value.id+'"></div>';
				html+='<h2><a href="'+value.link+'" class="content-ticket" id="titre-ticket-<?php echo $id;?>">'+value.title+'</a></h2>';
				html+='<div class="mobil-content">';
					if(typeof value.video != 'undefined'){
						html+='<div class="ticket-video">'+value.video+'</div>';
					}else{
						html+='<p class="ticket-content-text"><a href="'+value.link+'" class="content-ticket" id="content-ticket-'+value.link+'">'+value.excerpt+'</a></p>';
					}

					if(typeof value.extLink != 'undefined'){
						html+='<div><a href="'+value.extLink+'" target="_blank">Visitez le site</a></div>';
					}
				html+='</div>';
			html+='</div>';
		}
	});
	$('#main').html(html);
}

$(document).ready( function(){
	htmlTicket(tickets);
	var sizeSelect = "size-3";
	var echelle = 300/225;
	$('.ticket').mouseenter( function(e){
		$(this).find('.option-ticket').css('display', 'block');

		$('.big-ticket').click( function(e){
			e.preventDefault();
			var elemTicket = $(this).parents().eq(3);
			var idTicket = $(this).parents().eq(3).attr('id');
			var spl_idTicket = idTicket.split('-');

			elemTicket.removeClass('size-3');
			elemTicket.addClass('big');

			if(elemTicket.hasClass('type-article')){
				elemTicket.find('.ticket-content-text').html(tickets[spl_idTicket[spl_idTicket.length-1]]['article']);
			}else if(elemTicket.hasClass('type-video')){
				console.log(elemTicket.width()/echelle);
				console.log(elemTicket.width()/echelle-20);
				elemTicket.find('iframe').attr('height',elemTicket.width()/echelle-20);
				elemTicket.find('iframe').css('padding-bottom','30px');
			}
		});
		$('.small-ticket').click( function(e){
			e.preventDefault();
			var elemTicket = $(this).parents().eq(3);
			var idTicket = $(this).parents().eq(3).attr('id');
			var spl_idTicket = idTicket.split('-');
			$(this).parents().eq(3).removeClass('big');
			$(this).parents().eq(3).addClass(sizeSelect);
			if(elemTicket.hasClass('type-article')){
				console.log('rouge');
				elemTicket.find('.ticket-content-text').html(tickets[spl_idTicket[spl_idTicket.length-1]]['excerpt']);
			}else if(elemTicket.hasClass('type-video')){
				elemTicket.find('iframe').attr('height',elemTicket.width()/echelle);
			}
		});
	});
	
	$('.ticket').mouseleave( function(){
		$(this).find('.option-ticket').css('display', 'none');
	});

	$('.btn-nb-ticket').click( function(e){
		e.preventDefault();
		var idOption = $(this).attr('id');
		var splIdOption = idOption.split('-');
		if(splIdOption[splIdOption.length-1]==4){
			$('.size-3').each(function(){
				$(this).removeClass('size-3');
				$(this).addClass('size-4');
				sizeSelect = "size-4";
				$('iframe').each( function(){
					$(this).attr('width','210');
					$(this).attr('height','157');
				});
			});
		}else{
			$('.size-4').each(function(){
				$(this).removeClass('size-4');
				$(this).addClass('size-3');
				sizeSelect = "size-3";
				$('iframe').each( function(){
					$(this).attr('width','300');
					$(this).attr('height','225');
				});
			});
		}
	});

	$('.btn-by-type').click( function(e){
		e.preventDefault();
		$.each(tickets, function(index, value){
			value.aff = true;
		});
		var idBtnType = $(this).attr('id');
		var spl_idBtnType = idBtnType.split('-');
		var last_id = spl_idBtnType.length-1;
		$.each(tickets, function(index, value){
			if(spl_idBtnType[last_id]=='video'){
				if(typeof value.video == 'undefined'){
					value.aff = false;
				}
			}else if(spl_idBtnType[last_id]=='article'){
				if(typeof value.article == 'undefined'){
					value.aff = false;
				}
			}else if(spl_idBtnType[last_id]=='link'){
				console.log('rouge');
				if(typeof value.extLink == 'undefined'){
					value.aff = false;
				}
			}else if(spl_idBtnType[last_id]=='all'){
				value.aff = true;
			}
		});

		htmlTicket(tickets);
	});
});