


	function raspuns_acceptat(reply_id) {
		

		$.ajax({
			 headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		},
				type: 'POST',
				url: '/raspunsacceptat',
				data: {reply_id:reply_id,topic:topic},
				dataType: 'json',
				timeout: 9000,
				success:function(data) {
					$('.acceptat').css('color','gray','border-style','solid;');
					$('#check_'+reply_id).css('color','green','border-style','solid;');
				}
			

			});
		
	}


