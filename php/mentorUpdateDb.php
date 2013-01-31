<?php
session_start();
$id = $_SESSION["id"];
$username = $_POST["username"];
$major = $_POST["major"];
$homepage = $_POST["homepage"];
$intro = $_POST["intro"];
$email = $_POST["email"];
$office = $_POST["office"];
$allowed = array("jpg","jpeg","gif","png");
$extension = explode(".",$_FILES["file"]["name"]);
$extension = end($extension);
$photo = "photoOfte/".$id.'.'.$extension;
if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/jpg"))
	&& in_array($extension, $allowed)){
	if ($_FILES["file"]["error"]>0){
		echo "Return Code:".$_FILES["file"]["error"]."<br />";
	}
	else{
		echo "Upload:".$_FILES["file"]["name"]."<br />";
	}
	move_uploaded_file($_FILES["file"]["tmp_name"],'../'.$photo);
	echo "ok!";
}
else{
	echo $_FILES["file"]["type"];
	echo $_FILES["file"]["name"];
	echo "Invalid file";
}

$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
mysql_select_db("IEEE",$conn);
mysql_query("SET NAMES UTF8");
$sql = "UPDATE mentor SET 姓名='$username',专业='$major',个人主页='$homepage',简介='$intro',email='$email',办公室='$office',photo='$photo' WHERE id='$id'";
if (!mysql_query($sql, $conn)){
	echo "<script>alert('更新信息失败!');</script>";
	echo "<script>window.location.href='mentorUpdate.php'</script>";
}
else{
	echo "<script>alert('更新信息成功!');</script>";
	echo "<script>window.location.href='mentorSelf.php'</script>";
}
mysql_close($conn);
?>
