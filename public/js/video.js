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
				
				console.log(data);

				if(data.status) {
					$(".video_field_name").val(data.name);
					$(".video_field_image").attr('src', data.image);
				}
			}
		})
	}
}