$(document).ready(function(){
// 	在文档载入后获取个人信息
	jumpToinfo();
	
// 	获取个人信息
	$('#information').click(function(){
		jumpToinfo();
	});
	
// 	更新信息
	$('#updateinfo').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/studentUpdate.php',{'ISAJAX':'AJAX'},function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data) ;
			}
			else{
				alert(status);
			}
		});
		return false;
	});
	
	$('#updatephoto').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/updatePhoto.php',{'ISAJAX':'AJAX'},function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data) ;
			}
			else{
				alert(status);
			}
		});
		return false;
	});
	
	
	$('#myMentor').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/myMentor.php',{'ISAJAX':'AJAX'},function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data) ;
			}
			else{
				alert(status);
			}
		});
		return false;
	});
	
	
	$('#mentorList').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/mentorList.php',{'ISAJAX':'AJAX'},function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data) ;
			}
			else{
				alert(status);
			}
		});
		return false;
	});
		
	$('#sltRecordMt').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/sltRecordMt.php',{'ISAJAX':'AJAX'},function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data) ;
			}
			else{
				alert(status);
			}
		});
		return false;
	});
	$('#failedMt').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/failedMt.php',{'ISAJAX':'AJAX'},function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data);
			}
			else{
				alert(status);
			}
		});
		return false;
	});
});

// 获取个人信息
function jumpToinfo(){
	$('.activing').addClass('pending');
	$('.activing').removeClass('activing');
	$('#information').addClass('activing');
	$('#information').removeClass('pending');
	$.get('../php/information.php',{'ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#multiplexdiv").html(data);
		}
		else{
			alert(status);
		}
	});
	return false;
}
