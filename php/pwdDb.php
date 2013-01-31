<?php
session_start();
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
	$idtype = $_SESSION['idtype'];
	$pwd = md5($_POST["pwd"]);
	$newPwd = md5($_POST["newPwd"]);
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql = "select password from ".$idtype." where id='$id'";
	$res = mysql_query($sql,$conn);
	$rows = mysql_fetch_assoc($res);
	$oldPwd = $rows['password'];
	if ($oldPwd != $pwd or strlen($_POST["newPwd"]) < 7){
		echo "passerror";
	}
	else{	
		$sql = "UPDATE ".$idtype." SET password='$newPwd' WHERE id='$id'";
		if (!mysql_query($sql, $conn)){
			echo "wrong";			
		}
		else{
			echo "success";	
		}
	}
	mysql_close($conn);
}
else{
	echo "nologin";
}
?>
