Dropzone.options.addImages = {
	maxFilesize: 100,
	 maxFiles: 100,
	 acceptedFiles: "image/*,.psd,.pdf,.txt,.zip,.xlsx,.pptx,.docx",
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

		  
		console.log(response.file_mime);
		if(response.file_mime=="application/octet-stream"){
			var $video = $('<h3 id="img"><a href="' + imageSrc + '"><object  width="600" height="300" data="'+zip_url+'"></object></video></h3></a>');
			var $imageId =$('<h1><input type="hidden" name="image" value="'+imageId+'"></h1>');
		}
		else if(response.file_mime=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
			var $video = $('<h3 id="img"><a href="' + imageSrc + '"><object  width="600" height="300" data="'+exel_url+'"></object></video></h3></a>');
			var $imageId =$('<h1><input type="hidden" name="image" value="'+imageId+'"></h1>');
		}
		else if(response.file_mime=="application/vnd.openxmlformats-officedocument.presentationml.presentation"){
			var $video = $('<h3 id="img"><a href="' + imageSrc + '"><object  width="600" height="300" data="'+ppt_url+'"></object></video></h3></a>');
			var $imageId =$('<h1><input type="hidden" name="image" value="'+imageId+'"></h1>');
		}
		else if(response.file_mime=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			var $video = $('<h3 id="img"><a href="' + imageSrc + '"><object  width="600" height="300" data="'+word_url+'"></object></video></h3></a>');
			var $imageId =$('<h1><input type="hidden" name="image" value="'+imageId+'"></h1>');
		}
		else{
			var $video = $('<h3 id="img"><object  width="600" height="300" data="'+imageSrc+'"></object></video></h3>');
			var $imageId =$('<h1><input type="hidden" name="image" value="'+imageId+'"></h1>');
		}

		if(check){
			$('#gallery-images h3').replaceWith($video);
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
