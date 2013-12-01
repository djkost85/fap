$.video = function(){
	var self = this;

	self.checkUrl = function(value){
		$.ajax({
			url: '/add',
			data: {
				'url': value,
				'method': 'checkUrl'
			},
			dataType: 'json'
			success: function(data){
				if(data.status) {
					$(".video_field_name").val(data.name);
					$(".video_field_image").attr('src', data.image);
				}
			}
		})
	}
};