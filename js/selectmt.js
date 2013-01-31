$(document).ready(function(){
	$('.getmentorDetailform').click(function(){
		formdata = {'mtid':$(this).prev().val()};
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
			alert('success');
			getall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/sltMtDb.php';
		}
		});
		return false;
	});
	$('.ccMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/ccMtDb.php',formdata,function(data,status){
		if(status == 'success'){
			alert('success');
			getall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/ccMtDb.php';
		}
		});
		return false;
	});
	
	$('.rejectMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/rejectMtDb.php',formdata,function(data,status){
		if(status == 'success'){
			alert('success');
			getall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/rejectMtDb.php';
		}
		});
		return false;
	});
	
	$('.cfMtDb').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.post('../php/cfMtDb.php',formdata,function(data,status){
		if(status == 'success'){
			alert('success');
			getall();
// 			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/cfMtDb.php';
		}
		});
		return false;
	});
}); 
