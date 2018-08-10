Dropzone.options.addImages = {
	maxFilesize: 200,
	 maxFiles: 100,
	 acceptedFiles: "audio/*,video/*",
	success:function(file,response){
		if(file.status == 'success'){
			handleDropzoneFileUpload.handleSuccess(response);

		}
		else{
			handleDropzoneFileUpload.handleError(response);
		}
	}

};

var handleDropzoneFileUpload ={
	handleError:function(response){
		console.log(response);
	},
	handleSuccess:function(response){
		var imageList = $('#gallery-images ul');
		var imageSrc = base_url+'/' + response.file_path;
		var imageId = response.id;
		var check = document.getElementById("img");
		var $video = $('<li id="img"><video src="'+imageSrc+'" class="responsive-video"  controls="controls" width="640" height="360"></video></li>');
		var $imageId =$('<h1><input type="hidden" name="image" value="'+imageId+'"></h1>');
		if(check){
			$('#gallery-images li').replaceWith($video);
			$('#gallery-images h1').replaceWith($imageId);
		}
		else{
			$(imageList).append($video);
			$(imageList).append($imageId);
		
		}

	}
};
$(document).ready(function(){
	console.log('Doucment is ready');
});
