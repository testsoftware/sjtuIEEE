function pwdTest(){
	if($('#pwd').val() =='' || $('#newPwd').val()=='' || $('#newPwd2').val()==''){
		alert("请把密码填写完整");
		return false;
	}
	else if( $('#newPwd').val() != $('#newPwd2').val()){
		alert("密码不一致");
		$('#newPwd2').focus();
		return false;
	}
	else{
		rank = pwdRank();
		if(rank < 20 || $('#newPwd').val().length < 7 ){
			alert("密码太弱");
		}
		else{
			formdata = $('#pwdform').serialize();
			$.post('../php/pwdDb.php',formdata,function(data){
			if(data == 'success'){
				alert('更新成功');
			}
			else if(data == 'passerror'){
				alert('原密码错误');
			}
			else if(data=='nologin'){
				alert('请登录');
			}
			else{
				alert('不明错误,请再试一遍');
			}
// 			不能放在外面 否则没ajax就跳转页面了
			window.location.replace('../php/login.php');
			});
		}
	}
	return false;
};


$(document).ready(function()
{
	// check the password is correct or not
	var flagPwd = 0;
	var flagNewPwd = 0;
	var flagNewPwd2 = 0;
	$('#pwd').blur(function()
	{
		pwd = $('#pwd').val();
		formdata = {'pwd':pwd};
		$('#pwdCor').addClass('thick');
		$.post('../php/checkpwdDb.php',formdata,function(data)
		{
			if(data == 'passerror')
			{
				$('#pwdCor').removeClass('alert-success');
				$('#pwdCor').addClass('alert-error');
				$('#pwdCor').text('原密码输入错误');
				$('#pwdCor').show();
				flagPwd = 0;
				$('#submit').prop("disabled",true);
			}
			else if(data == "nologin")
			{
				alert('请登录');
				window.location.replace('../php/login.php');
			}
			else if(data == "pass")
			{
				$('#pwdCor').removeClass('alert-error');
				$('#pwdCor').addClass('alert-success');
				$('#pwdCor').text("原密码输入正确");
				$('#pwdCor').show();
				flagPwd = 1;
				if (flagPwd*flagNewPwd*flagNewPwd2==0)
				{
					$('#submit').prop("disabled",true);
				}
				else 
				{
					$('#submit').prop("disabled",false);
				} 
			}
			else{
				alert('不明错误,请再试一遍');
			}
		});
	});

	// 1 measure the strength of new password and 2 check whether they are the same again if you change the new password!
	$('#newPwd').bind(
	{
		keyup:function()
		{
			// 1
			score = pwdRank();
			$('#pwdRank').show();
			$('#pwdRank').addClass('thick');
			if (score<=20)
			{
				$('#newPwd2').prop("disabled",true);
				$('#pwdRank').removeClass('alert-success');
				$('#pwdRank').addClass('alert-error');
				$('#pwdRank').text("密码强度较弱,只有" + score);
				$('#pwdSame').hide();
				flagNewPwd = 0;
				$('#submit').prop("disabled",true);
			}
			else
			{
				if (score>20 && score<=50)
				{
					$('#newPwd2').prop("disabled",false);
					$('#pwdRank').removeClass('alert-error');
					$('#pwdRank').removeClass('alert-success');
					$('#pwdRank').text("密码强度一般，为"+ score);
					$('#submit').prop("disabled",false);
					flagNewPwd = 1;
					if (flagPwd*flagNewPwd*flagNewPwd2==0)
					{
						$('#submit').prop("disabled",true);
					}
					else 
					{
						$('#submit').prop("disabled",false);
					} 
				}
				else
				{
					$('#newPwd2').prop("disabled",false);
					$('#pwdRank').removeClass('alert-error');
					$('#pwdRank').addClass('alert-success');
					$('#pwdRank').text("密码强度良好，有"+ score);
					flagNewPwd = 1;
					if (flagPwd*flagNewPwd*flagNewPwd2==0)
					{
						$('#submit').prop("disabled",true);
					}
					else 
					{
						$('#submit').prop("disabled",false);
					} 
				}
				// 2
				$('#pwdSame').addClass('thick');
				if ($('#newPwd').val() == "" || $('#newPwd2').val() == "")
				{
					$('#pwdSame').hide();
					flagNewPwd2 = 0;
					$('#submit').prop("disabled",true);
					return false;
				}
				if( $('#newPwd').val() == $('#newPwd2').val())
				{
					$('#pwdSame').removeClass('alert-error');
					$('#pwdSame').addClass('alert-success');
					$('#pwdSame').text("两次输入密码一致");
					$('#pwdSame').show();
					flagNewPwd2 = 1;
					if (flagPwd*flagNewPwd*flagNewPwd2==0)
					{
						$('#submit').prop("disabled",true);
					}
					else 
					{
						$('#submit').prop("disabled",false);
					} 
				}
				else
				{
					$('#pwdSame').removeClass('alert-success');
					$('#pwdSame').addClass('alert-error');
					$('#pwdSame').text("两次输入密码不一致");
					$('#pwdSame').show();
					flagNewPwd2 = 0;
					$('#submit').prop("disabled",true);
				}
			}
		}
	});

	// check whether these two new input passwords are the same or not 
	$('#pwdSame').addClass('thick');
  	$("#newPwd2").keyup(function()
  	{
	    if( $('#newPwd').val() == $('#newPwd2').val())
		{
			if ($('#newPwd').val() == "")
			{
				flagNewPwd = 0;
				$('#pwdSame').hide();
			}
			else
			{
				$('#pwdSame').removeClass('alert-error');
				$('#pwdSame').addClass('alert-success');
				$('#pwdSame').text("两次输入密码一致");
				$('#pwdSame').show();
				flagNewPwd2 = 1;
				if (flagPwd*flagNewPwd*flagNewPwd2==0)
				{
					$('#submit').prop("disabled",true);
				}
				else 
				{
					$('#submit').prop("disabled",false);
				} 
			}
		}
		else
		{
			$('#pwdSame').removeClass('alert-success');
			$('#pwdSame').addClass('alert-error');
			$('#pwdSame').text("两次输入密码不一致");
			$('#pwdSame').show();
			flagNewPwd2 = 0;
			$('#submit').prop("disabled",true);
		}
  	});

});

function pwdRank()
{
	username = $('#id').text();
	pwd = $('#newPwd').val();
	var strength = PasswordStrength.test(username,pwd);
	var score = 0;
	//20为限，前提是长度大于6
	if(pwd.length < 7){
		score = Math.floor(strength.score*0.3);
		if(score > 20){
			score = 19;
		}
	}
	else{
		score = strength.score;
	}
	return score;
}
