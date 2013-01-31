function getall(){
	$.get('../php/getmentorlist.php',{'range':'all','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
	});
}
$(document).ready(function(){
	getall();
	$('#allmentor').click(function(){
		getall();
		return false;
	});
	$('#csmentor').click(function(){
		$.get('../php/getmentorlist.php',{'range':'cs','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
		});
		return false;
	});
	$('#itmentor').click(function(){
		$.get('../php/getmentorlist.php',{'range':'it','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
		});
		return false;
	});
	$('#atmentor').click(function(){
		$.get('../php/getmentorlist.php',{'range':'at','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
		});
		return false;
	});
	$('#iementor').click(function(){
		$.get('../php/getmentorlist.php',{'range':'ie','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
		});
		return false;
	});
	$('#eementor').click(function(){
		$.get('../php/getmentorlist.php',{'range':'ee','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
		});
		return false;
	});
	$('#elmentor').click(function(){
		$.get('../php/getmentorlist.php',{'range':'el','ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
		}
		else{
			window.location.href = '../php/getmentorlist.php';
		}
		});
		return false;
	});
	
});
