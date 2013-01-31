function getmentortype(mentortype){
	$.get('../php/getmentorlist.php',{'range':mentortype,'ISAJAX':'AJAX'},function(data,status){
		if(status == 'success'){
			$("#mentorlistdiv").html(data);
			$("#listtype").val(mentortype);
		}
		else{
			alert(status);
		}
	});
}

$(document).ready(function(){
	getmentortype('all');
	$('#allmentor').click(function(){
		getmentortype('all');
		return false;
	});
	$('#csmentor').click(function(){
		getmentortype('cs');
		return false;
	});
	$('#itmentor').click(function(){
		getmentortype('it');
		return false;
	});
	$('#atmentor').click(function(){
		getmentortype('at');
		return false;
	});
	$('#iementor').click(function(){
		getmentortype('ie');
		return false;
	});
	$('#eementor').click(function(){
		getmentortype('ee');
		return false;
	});
	$('#elmentor').click(function(){
		getmentortype('el');
		return false;
	});
	
});
