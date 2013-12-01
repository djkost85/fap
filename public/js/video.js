$(function(){
	$.video();
})

$.video = function(){
	var self = this;

	$(".video_field_checkurl").unbind('keypress paste').on({
		'keypress paste': function(){
			self.checkUrl($(this).val());
		}
	})

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