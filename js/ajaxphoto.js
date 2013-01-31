function ajaxupload(){
	var uploader = new qq.FileUploader({
		element:document.getElementById('uploadphoto'),
		action:'../php/uptmpphoto.php',
		allowedExtensions:['jpg', 'jpeg', 'png', 'gif'],
		sizeLimit:7*1024*1024,
		minSizeLimit:1024*20,
		multiple:false,
		onSubmit:function(id,fileName){
			if($('input[name=photopath]').val() != ''){
				$.post('../php/deletephoto.php',{'photopath':$('input[name=photopath]').val()});
			}
		},
		onComplete: function(id,fileName,responseJSON){
			//On completion clear the status
// 			status.text('');
			//Add uploaded file to list
			if(responseJSON.success){
				$('#myphoto').attr( 'id','uploadphoto');
				$('#uploadphoto').attr('src',responseJSON.filepath);
				$('#uploadphoto').css('width','600px')
				$('#status').text('请选择区域');
				$('#status').show();
				$('input[name="photopath"]').val(responseJSON.filepath);
				$('#uploadphoto').imgAreaSelect({
				x1: 120, y1: 90, x2: 180, y2: 170 ,
				aspectRatio: '3:4', maxWidth: 390, maxHeight: 520,
				parent:$('#multiplexdiv'),
				onSelectEnd: function (img, selection) {
				$('input[name="x1"]').val(selection.x1);
				$('input[name="y1"]').val(selection.y1);
				$('input[name="x2"]').val(selection.x2);
				$('input[name="y2"]').val(selection.y2);
				$('#myphotosubmit').attr("disabled",false);
				$('#status').text('ok');
				},
				handles: true
				});
			}
			else if(responseJSON.error == "nologin"){
				alert('请登录');
				window.location.replace('../php/login.php');
			}
			else{
				alert(responseJSON.error);
			}
		}
		
	});
}
/*
	var btnUpload=$('#upload');
	$('#myphoto').css('width','360px');
	new AjaxUpload(btnUpload,{
		action: 'uptmpphoto.php',
		name: 'uploadfile',
		onSubmit: function(file, ext){
		 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                   // extension is not allowed 
			$('#status').text('Only JPG, PNG or GIF files are allowed');
			$('#status').show();
			alert("请上传jpg,png,gif文件，并检查文件后缀名");
			return false;
			}
 			$('#status').text('Uploading...');
 			$('#status').show();
		},
		onComplete: function(file, response){
			//On completion clear the status
// 			status.text('');
			//Add uploaded file to list
			response = response.toLowerCase();
			if(response == "nologin"){
				alert('请登录');
				window.location.replace('../php/login.php');
			}
			else if(response == "the image is too large"){
				alert("图片太大");
			}
			else if(response == "something error"){
				alert("请再试一遍");
			}
			else if(response == "error,maybe the image is too large"){
				alert("请上传jpg,png,gif文件，并检查文件后缀名");
			}
			else{
				$('#myphoto').attr( 'id','uploadphoto');
				$('#uploadphoto').attr('src',response);
				$('#uploadphoto').css('width','600px')
				$('#status').text('请选择区域');
				$('#status').show();
				$('input[name="photopath"]').val(response);
				$('#uploadphoto').imgAreaSelect({
				x1: 120, y1: 90, x2: 180, y2: 170 ,
				aspectRatio: '3:4', maxWidth: 390, maxHeight: 520,
				parent:$('#multiplexdiv'),
				onSelectEnd: function (img, selection) {
				$('input[name="x1"]').val(selection.x1);
				$('input[name="y1"]').val(selection.y1);
				$('input[name="x2"]').val(selection.x2);
				$('input[name="y2"]').val(selection.y2);
				$('#myphotosubmit').attr("disabled",false);
				$('#status').text('ok');
				},
				handles: true
			});
			} 
			
		},
	});
*/
$(document).ready(function(){
	$("#myphotosubmit").click(function(){
		formdata = $('#cropphotoform').serialize();
		$.post('../php/cropphoto.php',formdata,function(data){
			if(data == "success"){
				alert("成功");
				jumpToinfo();
			}
			else if(data == "nologin"){
				alert('请登录');
				window.location.replace('../php/login.php');
			}
			else{
				alert(data);
			}
		});
		return false;
	});

});
