<?php
session_start();
if(isset($_SESSION['id'])){
	if($_SESSION['idtype']!='student'){
		session_destroy();
		exit(htmlspecialchars(json_encode(array('error'=>'iderror')),ENT_NOQUOTES));
	}
	$id = $_SESSION["id"];
	$class = $_POST["class"];
	$grade = $_POST["grade"];
	$gpa = $_POST["gpa"];
	$rank = $_POST["rank"];
	$introduction = $_POST["introduction"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$majorsubject = $_POST["majorsubject"];
	$majordirection = $_POST["majordirection"];
	$majordirection2 = $_POST["majordirection2"];
	$minorsubject = $_POST["minorsubject"];
	$minordirection = $_POST["minordirection"];
	$numfcourse = $_POST["numfcourse"];
	$originnum = $_POST["originnum"];
	$num = $numfcourse;
	if($originnum > $numfcourse){
		$num = $originnum;
	}
	$arrnamefcourse = array();
	$arrwhyfcourse = array();
	for($i=1;$i<=$num;$i++){
		if(!(empty($_POST["namefcourse".$i]) or empty($_POST["whyfcourse".$i]) )){
			array_push($arrnamefcourse,$_POST["namefcourse".$i]);
			array_push($arrwhyfcourse,$_POST["whyfcourse".$i]);
		}
	}
	$namefcourse = implode('<<<split@#0Gq~%]wWsplit>>>',$arrnamefcourse);
	$whyfcourse = implode('<<<split@#0Gq~%]wWsplit>>>',$arrwhyfcourse);
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql = "UPDATE student SET 班级='$class',年级='$grade',学积分=$gpa,排名=$rank,简介='$introduction',手机号码='$phone',email='$email',主修专业='$majorsubject',主修方向一='$majordirection',主修方向二='$majordirection2',辅修专业='$minorsubject',辅修方向='$minordirection',挂科数=$numfcourse,挂科科目='$namefcourse',挂科说明='$whyfcourse' WHERE id='$id' ";
	if (!mysql_query($sql, $conn)){
		echo htmlspecialchars(json_encode(array('error'=>'sqlerror')),ENT_NOQUOTES);
	}
	else{
		echo htmlspecialchars(json_encode(array('success'=>TRUE)),ENT_NOQUOTES);
	}
	mysql_close($conn);
}
else{
	echo htmlspecialchars(json_encode(array('error'=>'nologin')),ENT_NOQUOTES);
}

?>

