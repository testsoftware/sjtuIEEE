

/* jquery version
$(document).ready(function(){
	$('#statusofprocess').click(function(){
		formdata = $('#loginform').serialize();
		$.post('../php/loginDb.php',formdata,function(data){
			if(data=='mentorOk'){
				document.getElementById('statusofprocess').innerHTML = 'ok';
				window.location.replace('../php/mentorSelf.php');
			}
			else if(data=='boyOk'|| data=='girlOk' ){
				document.getElementById('statusofprocess').innerHTML = 'ok';
				window.location.replace('../php/studentSelf.php');
			}
			else{
				alert('请检查你的信息');
				document.getElementById('statusofprocess').innerHTML = '登录';
			}
		});
		return false;
	});
});
*/


function ajaxlogin(){
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xhr=new XMLHttpRequest();
	}
	else{
		// code for IE6, IE5
		xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhr.onreadystatechange = function(){
		if(xhr.readyState < 4 && xhr.readyState > 0){
			//in produce
			document.getElementById('statusofprocess').innerHTML = '请稍等';
		}
		if (xhr.readyState == 4){
			if(xhr.responseText=='mentorOk'){
				document.getElementById('statusofprocess').innerHTML = 'ok';
				window.location.replace('../php/mentorSelf.php');
			}
			else if(xhr.responseText=='boyOk'|| xhr.responseText=='girlOk' ){
				document.getElementById('statusofprocess').innerHTML = 'ok';
				window.location.replace('../php/studentSelf.php');
			}
			else{
				alert('请检查你的信息');
				document.getElementById('statusofprocess').innerHTML = '登录';
			}
		}
	};
	xhr.open("post","../php/loginDb.php",true);
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var formdata = $('#loginform').serialize();
	xhr.send(formdata);
}

function setName(val){ 
//run some code when "onchange" event fires
	var selectName=document.getElementById("identifyName");
	if(val=="学生"){
		selectName.innerHTML="学号";
	}
	else{
		selectName.innerHTML="工号";
	}
}