jQuery(document).ready(function() {
	// Stuff to do as soon as the DOM is ready;
	// click sltRecordMt
	$("#sltRecordSt").click(function(){
		$.get('../php/sltRecordSt.php',function(data,status){
			$("#2").html(status);
			if(status == 'success'){
				$("#2").html(data);
			}
			else{
				window.location.href = '../php/sltRecordSt.php';
			}
		});
	});

	// click myStudent
	$("#myStudent").click(function(){
		$.get('../php/myStudent.php',function(data,status){
			$("#3").html(status);
			if (status == 'success'){
				$("#3").html(data);
			}
			else{
				window.location.href = '../php/myStudent.php';
			}
		});
	});

    // click mentorUpdate
    $("#mentorUpdate").click(function(){
		$.get('../php/mentorUpdate.php',function(data,status){
			$("#4").html(status);
			if (status == 'success'){
				$("#4").html(data);
			}
			else{
				window.location.href = '../php/mentorUpdate.php';
			}
		});
	}); 

    $("#username").blur(function(){
		if ($("#username").val() == ""){
			alert("请输入姓名。");
			$("#username").focus();
			// $("#update").prop("disabled",true);
		}
	});
	$("#major").blur(function(){
		if ($("#major").val() == ""){
			alert("请输入专业。");
			$("#major").focus();
			// $("#update").prop("disabled",true);
		}
	});
	$("#homepage").blur(function(){
		if ($("#homepage").val() == ""){
			alert("请输入姓名。");
			$("#homepage").focus();
			// $("#update").prop("disabled",true);
		}
	});
	$("#intro").blur(function(){
		if ($("#intro").val() == ""){
			alert("请输入简介。");
			$("#intro").focus();
			// $("#update").prop("disabled",true);
		}
	});
	$("#email").blur(function(){
		if ($("#email").val() == ""){
			alert("请输入email地址。");
			$("#email").focus();
			// $("#update").prop("disabled",true);
		}
	});
	$("#office").blur(function(){
		if ($("#office").val() == ""){
			alert("请输入办公室地址。");
			$("#office").focus();
			// $("#update").prop("disabled",true);
		}
	});

	// click photoUpdate
	$("#photoUpdate").click(function(){
		$.get('../php/mentorPhoto.php',function(data,status){
			$("#5").html(status);
			if (status == 'success'){
				$("#5").html(data);
			}
			else{
				window.location.href = '../php/mentorPhoto.php';
			}
		});
	}); 
});