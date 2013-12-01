function Video(){
	var self = this;
};

Video.prototype = {
	checkUrl: function(value, csrf){

		$.ajax({
			url: '/add',
			type: 'post',
			dataType: 'json',
			data: {
				'url': value,
				'method': 'checkUrl',
				'csrf': csrf
			},
			success: function(data){
				if(data.status) {
					$("#add_field_name").val(data.title).focus();
					$("#add_field_image").attr('src', data.image_medium);
					$("#add_field_duration").text(data.duration);

					$(".form_group").removeClass("state_hide");
				}
			}
		})
	}
}