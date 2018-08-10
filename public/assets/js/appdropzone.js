Dropzone.options.addImages = {
	maxFilesize: 100,
	 maxFiles: 100,
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
		var check = document.getElementById("img");
		if(check){
			$('#gallery-images li').replaceWith('<li id="img"><a href="'+ imageSrc + '" data-lightbox="mygallery"><img src="'+ imageSrc +'"></a></li>');
		}
		else{
			$(imageList).append('<li id="img"><a href="'+ imageSrc + '" data-lightbox="mygallery"><img src="'+ imageSrc +'"></a></li>');
		}

	}
};
$(document).ready(function(){
	console.log('Doucment is ready');
});
