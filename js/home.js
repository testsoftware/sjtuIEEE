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
				window.location.href = '../php/studentUpdate.php';
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
				window.location.href = '../php/updatePhoto.php';
			}
		});
		return false;
	});
	
// 	更改密码
	$('#password').click(function(){
		$('.activing').addClass('pending');
		$('.activing').removeClass('activing');
                $(this).addClass('activing');
		$(this).removeClass('pending');
		$.get('../php/pwd.php',function(data,status){
			if(status == 'success'){
				$("#multiplexdiv").html(data);
			}
			else{
				window.location.href = '../php/pwd.php';
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
				window.location.href = '../php/myMentor.php';
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
				window.location.href = '../php/mentorList.php';
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
				window.location.href = '../php/sltRecordMt.php';
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
				window.location.href = '../php/failedMt.php';
			}
		});
		return false;
	});
});

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
			window.location.href = '../php/information.php';
		}
	});
	return false;
}
