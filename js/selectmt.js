$(document).ready(function(){
	$('.getmentorDetailform').click(function(){
		formdata = {'mtid':$(this).prev().val(),'fromurl':'mentorlist'};
		$.get('../php/mentorDetail.php',formdata,function(data,status){
			if(status == 'success'){
				$("#mentorlistdiv").html(data);
			}
			else{
				window.location.href = '../php/mentorDetail.php';
			}
		});
		return false;
	});
	
	$('.sltMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/sltMtDb.php',formdata,function(data,status){
			if(status == 'success'){
				if(data.success){
					alert('成功');
					getmentortype($('#listtype').val());
				}
				else if(data.error == 'iderror'){
					alert('你的信息有误，是否重复登录？请重新登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error == 'numerror'){
					alert('你已选满3位导师');
				}
				else if(data.error=='nologin'){
					alert('请登录');
					window.location.replace('../php/login.php');
				}
				else{
					alert('数据库错误');
				}
			}
			else{
				alert(status);
			}
		},"json");
		return false;
	});
	
	$('.ccMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/ccMtDb.php',formdata,function(data,status){
			if(status == 'success'){
				if(data.success){
					alert('成功');
					getmentortype($('#listtype').val());
				}
				else if(data.error == 'iderror'){
					alert('你的信息有误，是否重复登录？请重新登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error == 'statuserror'){
					alert('你的导师已确认，无法取消，请联系该导师');
				}
				else if(data.error=='nologin'){
					alert('请登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error=='mentoriderror'){
					alert('你没有选择该老师，如有疑问请联系负责人');
				}
				else{
					alert('数据库错误');
				}
			}
			else{
				alert(status);
			}
		},"json");
		return false;
	});
	
	$('.rejectMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/rejectMtDb.php',formdata,function(data,status){
			if(status == 'success'){
				if(data.success){
					alert('成功');
					getmentortype($('#listtype').val());
				}
				else if(data.error == 'iderror'){
					alert('你的信息有误，是否重复登录？请重新登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error == 'statuserror'){
					alert('你的导师状态不正确，无法进行该操作');
				}
				else if(data.error=='nologin'){
					alert('请登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error=='mentoriderror'){
					alert('你没有选择该老师，如有疑问请联系负责人');
				}
				else{
					alert('数据库错误');
				}
			}
			else{
				alert(status);
			}
		},"json");
		return false;
	});
	
	$('.cfMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/cfMtDb.php',formdata,function(data,status){
			if(status == 'success'){
				if(data.success){
					alert('成功');
					getmentortype($('#listtype').val());
				}
				else if(data.error == 'iderror'){
					alert('你的信息有误，是否重复登录？请重新登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error == 'statuserror'){
					alert('你的导师状态不正确，无法进行该操作');
				}
				else if(data.error=='nologin'){
					alert('请登录');
					window.location.replace('../php/login.php');
				}
				else if(data.error=='mentoriderror'){
					alert('你没有选择该老师，如有疑问请联系负责人');
				}
				else{
					alert('数据库错误');
				}
			}
			else{
				alert(status);
			}
		},"json");
		return false;
	});
}); 
