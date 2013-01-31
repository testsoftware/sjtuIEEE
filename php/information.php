<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
session_start();
if (isset($_SESSION['id'])){
	if($_SESSION['idtype'] == 'mentor'){
		$username = $_SESSION['username'];
		$id = $_SESSION['id'];
		$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
		mysql_select_db("IEEE",$conn);
		mysql_query("SET NAMES UTF8",$conn); 
		$sql= mysql_query("SELECT * FROM mentor where id='$id'");
		$row = mysql_fetch_assoc($sql);
		$major = $row['专业'];
		$intro = $row['简介'];
		$homepage = $row['个人主页'];
		$email = $row['email'];
		$office = $row['办公室'];  
		$photo = $row['photo'];           
		mysql_close($conn);
	}
	else{
		$username = $_SESSION['username'];
		$id = $_SESSION['id'];
		$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
		mysql_select_db("IEEE",$conn);
		mysql_query("SET NAMES UTF8",$conn); 
		$sql= mysql_query("SELECT * FROM student where id='$id'");
		$row = mysql_fetch_assoc($sql);
		if($row['性别'] == 0){
			$sex = '女';
		}
		else{
			$sex = '男';
		}
		echo "<div class='span4'><table class='table table-hover table-bordered selfinfo '>";
		echo "<tr><td>学号</td><td>".$id."</td></tr>";
		echo "<tr><td>姓名</td><td>".$username."</td></tr>";
		echo "<tr><td>性别</td><td>".$sex."</td></tr>";
		echo "<tr><td>综合测评</td><td>".$row['综合测评']."</td></tr>";
		echo "<tr><td>学积分</td><td>".$row['学积分']."</td></tr>";
		echo "<tr><td>挂科数</td><td>".$row['挂科数']."</td></tr>";
		echo "<tr><td>手机号码</td><td>".$row['手机号码']."</td></tr>";
		echo "<tr><td>email</td><td>".$row['email']."</td></tr>";
		echo "</table></div>";
		echo "<div class='selfphoto carousel-inner offset1'><img src='../".$row['photo']." 'class='img-rounded '/><div class='carousel-caption'><h4>$username</h4><p>$id</p></div></div></div>";
		mysql_close($conn);
	}
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?>