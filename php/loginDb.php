<?php
	session_start();
	//接收登录页面提交过来的用户名以及密码
	$id = $_POST['id'];
	$pwd = md5($_POST['pwd']);
	$type=$_POST['type'];
	//与数据库建立连接
	$con = mysql_connect('localhost', 'IEEE', 'IEEE2011');
	if (!$con){
		die("Unable to connect to database:" . mysql_error());
	}
	mysql_query('set names utf8');
	$db = mysql_select_db('IEEE', $con);
	if (!$db){
		die("Unable to select database:" . mysql_error());
	}
	if($type == '教授'){
		$sql = "select * from mentor where id='$id' and password='$pwd'";
	}
	else{
		$sql = "select * from student where id='$id' and password='$pwd'";
	}
	$res = mysql_query($sql);
	if (!$res){
		die("Could not successfully run query ($sql) from database" . mysql_error());
	} 
	$rows = mysql_fetch_assoc($res);
	if (!empty($rows)){
		$_SESSION['id']=$rows['id'];
		$_SESSION['username']=$rows['姓名'];
		$_SESSION['photo'] = $rows['photo'];
		if($type == '教授'){
			$_SESSION['idtype']='mentor';
			echo "mentorOk";
		}
		elseif($type=='学生' and $row['性别']=1){
			$_SESSION['idtype']='student';
			$_SESSION['sex'] = 1;
			echo "boyOk";
		}
		else{
			$_SESSION['idtype']='student';
			$_SESSION['sex'] = 0;
			echo "girlOk";
		}
	}
	else{
		echo "Failed";
	}
	mysql_close($con);
?>