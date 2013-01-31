// JavaScript Document
function menUpdateInfo(obj)
{
	if (obj.username.value == '')
	{
		alert("请输入姓名。");
		obj.username.focus();
		return false;
	}
	if (obj.major.value == '')
	{
		alert("请输入专业。");
		obj.major.focus();
		return false;
	}
	if (obj.homepage.value == '')
	{
		alert("请输入个人主页地址。");
		obj.homepage.focus();
		return false;
	}
	if (obj.intro.value == '')
	{
		alert("请输入简介。");
		obj.intro.focus();
		return false;
	}
	if (obj.email.value == '')
	{
		alert("请输入email地址。");
		obj.email.focus();
		return false;
	}
	if (obj.office.value == '')
	{
		alert("请输入办公室地址。");
		obj.office.focus();
		return false;
	}
	return true;
}