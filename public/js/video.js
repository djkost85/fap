function Video(){
	var self = this;
};

Video.prototype = {
	checkUrl: function(value){

		$.ajax({
			url: '/add',
			data: {
				'url': value,
				'method': 'checkUrl'
			},
			dataType: 'json',
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