<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
session_start();
if (isset($_SESSION['id'])){
	if($_SESSION['idtype']!='student'){
		session_destroy();
		exit('You have no authority to access this document,please login again');
	}
	$id = $_SESSION['id'];	
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
	exit('error');
}
?>
<!DOCTYPE html >
<html lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>record</title>
</head>
<body>
<?php
$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
mysql_select_db("IEEE",$conn);
mysql_query("SET NAMES UTF8",$conn); 
$sql= mysql_query("SELECT * FROM selectRlt where id='$id'");
$row = mysql_fetch_assoc($sql);

echo "<table class='table table-hover table-bordered'>";
echo "<tr><th>工号</th><th>状态</th><th>详细</th></tr>";
echo "<tr><form action='mentorDetail.php' method='get'> ";
echo "<td>".$row['导师一']."</td>";
echo "<td>".$row['状态一']."</td>";
echo "<td><input type='hidden' name='mtid' value='".$row['导师一']."' />";
echo "<input type='submit' value='详细' class='getmentorDetailform' /> </td>";
echo "</form></tr>";

echo "<tr><form action='mentorDetail.php' method='get'> ";
echo "<td>".$row['导师二']."</td>";
echo "<td>".$row['状态二']."</td>";
echo "<td><input type='hidden' name='mtid' value='".$row['导师二']."' />";
echo "<input type='submit' value='详细' class='getmentorDetailform' /> </td>";
echo "</form></tr>";

echo "<tr><form action='mentorDetail.php' method='get'> ";
echo "<td>".$row['导师三']."</td>";
echo "<td>".$row['状态三']."</td>";
echo "<td><input type='hidden' name='mtid' value='".$row['导师三']."' />";
echo "<input type='submit' value='详细' class='getmentorDetailform' /> </td>";
echo "</form></tr>";

echo "</table>";
?>
<script>
$(document).ready(function(){
$('.getmentorDetailform').click(function(){
		formdata = {'mtid':$(this).prev().val()};
		$.get('../php/mentorDetail.php',formdata,function(data,status){
		if(status == 'success'){
			$("#multiplexdiv").html(data);
		}
		else{
			window.location.href = '../php/mentorDetail.php';
		}
		});
		return false;
	});
});
</script>
</body>
</html> 
