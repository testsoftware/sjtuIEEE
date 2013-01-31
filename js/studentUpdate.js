$(document).ready(function(){
	$('#studentUpdateform').submit(function(){
		if($('input[name=class]').val() == '')
		{
			alert("请输入班级");
			$('input[name=class]').focus();
			return false;
		}
		if ($('input[name=gpa]').val() == '')
		{
			alert("请输入学积分");
			$('input[name=gpa]').focus();
			return false;
		}
		if ($('input[name=rank]').val() == '')
		{
			alert("请输入排名");
			$('input[name=rank]').focus();
			return false;
		}
		if ($('input[name=introduction]').val() == '')
		{
			alert("请输入简介");
			$('input[name=introduction]').focus();
			return false;
		}
		if ($('input[name=email]').val() == '')
		{
			alert("请输入email地址");
			$('#email').focus();
			return false;
		}
		if($('input[name=numfcourse]').val() == ''){
			alert("请输入挂科数目，没有则填零");
			return false;
		}
		formdata=$('#studentUpdateform').serialize();
		$.post('../php/studentUpdateDb.php',formdata,function(data){
			if(data == 'error'){
				alert('错误');
			}
			else if(data=='nologin'){
				alert('请登录');
				window.location.replace('../php/login.php');
			}
			else{
				alert('成功');
				$.get('../php/studentUpdate.php',{'ISAJAX':'AJAX'},function(data,status){
				if(status == 'success'){
					$("#multiplexdiv").html(data) ;
				}
				else{
					window.location.href = '../php/studentUpdate.php';
				}
				});
			}
		});
		return false;
	}); 
	$('select[name=majorsubject]').change(function(){
		switch($(this).val()){
			case '自动化':
				$('select[name=majordirection]').html('<option>网络系统与控制</option><option>智能机器人</option><option>图像信息处理与模式分析</option>');
				$('select[name=majordirection2]').html('<option>网络系统与控制</option><option>智能机器人</option><option>图像信息处理与模式分析</option>');
				break;
			case '计算机科学与技术':
				$('select[name=majordirection]').html('<option>机器学习</option><option>数据工程</option><option>网络计算</option>');
				$('select[name=majordirection2]').html('<option>机器学习</option><option>数据工程</option><option>网络计算</option>');
				break;
			case '电气工程与自动化':
				$('select[name=majordirection]').html('<option>电力系统及其自动化</option><option>高电压与绝缘技术</option><option>电力电子与电机技术</option>');
				$('select[name=majordirection2]').html('<option>电力系统及其自动化</option><option>高电压与绝缘技术</option><option>电力电子与电机技术</option>');
				break;
			case '信息工程':
				$('select[name=majordirection]').html('<option>多媒体信息处理</option><option>通信与网络</option><option>信息安全</option>');
				$('select[name=majordirection2]').html('<option>多媒体信息处理</option><option>通信与网络</option><option>信息安全</option>');
				break;
			case '电子科学与技术':
				$('select[name=majordirection]').html('<option>应用电路设计</option><option>微波射频系统分析</option><option>半导体材料与显示照明</option>');
				$('select[name=majordirection2]').html('<option>应用电路设计</option><option>微波射频系统分析</option><option>半导体材料与显示照明</option>');
				break;
			case '仪器科学与技术':
				$('select[name=majordirection]').html('<option>传感器与检测技术</option><option>现代仪器技术</option><option>导航与定位</option>');
				$('select[name=majordirection2]').html('<option>传感器与检测技术</option><option>现代仪器技术</option><option>导航与定位</option>');
				break;
		}
	});
	$('select[name=minorsubject]').change(function(){
		switch($(this).val()){
			case '自动化':
				$('select[name=minordirection]').html('<option>网络系统与控制</option><option>智能机器人</option><option>图像信息处理与模式分析</option>');break;
			case '计算机科学与技术':
				$('select[name=minordirection]').html('<option>机器学习</option><option>数据工程</option><option>网络计算</option>');break;
			case '电气工程与自动化':
				$('select[name=minordirection]').html('<option>电力系统及其自动化</option><option>高电压与绝缘技术</option><option>电力电子与电机技术</option>');break;
			case '信息工程':
				$('select[name=minordirection]').html('<option>多媒体信息处理</option><option>通信与网络</option><option>信息安全</option>');break;
			case '电子科学与技术':
				$('select[name=minordirection]').html('<option>应用电路设计</option><option>微波射频系统分析</option><option>半导体材料与显示照明</option>');break;
			case '仪器科学与技术':
				$('select[name=minordirection]').html('<option>传感器与检测技术</option><option>现代仪器技术</option><option>导航与定位</option>');break;
		}
	});
	$('input[name=numfcourse]').keyup(function(){
		var total = parseInt($(this).val());
		var content = "";
		var start = parseInt($("#originnum").val());
		for(var i=start+1;i<=total;i++){
			content = content + "<div class='control-group'><label class='control-label' for='namefcourse'>挂科科目</label><div class='controls'><input type='text' name='namefcourse"+i+"'class='input-xlarge'  placeholder='挂科科目' /> <br /> </div></div><div class='control-group'><label class='control-label' for='whyfcourse'>挂科说明</label><div class='controls'><textarea type='text' name='whyfcourse"+i+"' rows='4' class='span4'> </textarea><br /> </div></div>";
		}
		$('#addcourse').html(content);
	});
});