$(document).ready(function(){
	$('.getstudentDetailform').click(function(){
		formdata = {'stid':$(this).prev().val()};
		$.get('../php/studentDetail.php',formdata,function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/studentDetail.php';
		}
		});
		return false;
	});
	$('.sltStDb').click(function(){
		formdata = {'stid':$(this).prev().val()};
		$.post('../php/sltStDb.php',formdata,function(data,status){
		if(status == 'success'){
			alert('success');
			getall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/sltStDb.php';
		}
		});
		return false;
	});
	$('.ccStDb').click(function(){
		formdata = {'stid':$(this).prev().val()};
		$.post('../php/ccStDb.php',formdata,function(data,status){
		if(status == 'success'){
			alert('success');
			getall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/ccStDb.php';
		}
		});
		return false;
	});
	
	$('.rejectStDb').click(function(){
		formdata = {'stid':$(this).prev().val()};
		$.post('../php/rejectStDb.php',formdata,function(data,status){
		if(status == 'success'){
			alert('success');
			getstall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/rejectStDb.php';
		}
		});
		return false;
	});
}); 
