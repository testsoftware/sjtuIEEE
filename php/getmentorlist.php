<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
session_start();
if(isset($_SESSION['idtype']) and isset($_GET['range'])){
	if($_SESSION['idtype'] == 'student'){
		$idtype = 1;
		$num = 0;
		$id = $_SESSION['id'];
		$conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
		mysql_select_db("IEEE",$conn);
		mysql_query("SET NAMES UTF8",$conn); 
		$sql= mysql_query("SELECT * FROM selectRlt WHERE id = '$id'");
		$row = mysql_fetch_assoc($sql);
		if(!empty($row['导师一'])){
			$mentor1id = $row['导师一'];
			$mentor1status = $row['状态一'];
			$num ++;
		}
		if(!empty($row['导师二'])){
			$mentor2id = $row['导师二'];
			$mentor2status = $row['状态二'];
			$num ++;
		}
		if(!empty($row['导师三'])){
			$mentor3id = $row['导师三'];
			$mentor3status = $row['状态三'];
			$num ++;
		}
		if(!empty($row['确定导师'])){
			$num = 4;
		}
		mysql_close($conn);
	}
	else{
		$idtype = 0;
	}	
}
else{
	$idtype = 0;
}
?>
<!DOCTYPE html>
<html lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MentorList</title>
</head>
<body>
<?php
 $conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
 mysql_select_db("IEEE",$conn);
 mysql_query("SET NAMES UTF8",$conn); 
 switch($_GET['range']){
	case 'all':$sql= mysql_query("SELECT id,姓名,photo FROM mentor");break;
	case 'cs':$sql = mysql_query("SELECT id,姓名,photo FROM mentor where 专业='计算机科学与技术'");break;
	case 'it':$sql = mysql_query("SELECT id,姓名,photo FROM mentor where 专业='仪器科学与技术'");break;
	case 'at':$sql = mysql_query("SELECT id,姓名,photo FROM mentor where 专业='自动化'");break;
	case 'ie':$sql = mysql_query("SELECT id,姓名,photo FROM mentor where 专业='信息工程'");break;
	case 'el':$sql = mysql_query("SELECT id,姓名,photo FROM mentor where 专业='电气工程与自动化'");break;
	case 'ee':$sql = mysql_query("SELECT id,姓名,photo FROM mentor where 专业='电子科学与技术'");break;
 }
 echo "<table class='table table-hover table-bordered'>";
 echo "<tr><th>工号</th><th>姓名</th><th>详细</th><th>确定学生人数</th><th>状态</th><th>操作</th></tr>";
 while($row = mysql_fetch_array($sql)){
 	echo "<tr>";
	echo "<form action='mentorDetail.php' method='get'> ";
        echo "<td> 工号:".$row['id']."</td>";
        echo "<td>".$row['姓名']."</td>";
 	echo "<td> <input type='hidden' name='mtid' value='".$row['id']."'/>";
 	echo "<input type='submit' value='详细' class='getmentorDetailform' /> </td>";
 	echo "</form>";
 	
 	$sqlmentor = mysql_query("SELECT * FROM mentorselectRlt where id='".$row['id']."'");
	$rowmentor = mysql_fetch_assoc($sqlmentor);
	$studentnum = 0;
	if(!empty($rowmentor['学生一'])){
		if($rowmentor['状态一']==2){
			$studentnum ++;
		}
	}
	if(!empty($rowmentor['学生二'])){
		if($rowmentor['状态二']==2){
			$studentnum ++;
		}
	}
	echo "<td>$studentnum</td>";
 	if($idtype != 0){
		if(isset($mentor1id) and $mentor1id == $row['id']){
			$mentorid = $mentor1id;
			$status = $mentor1status;
		}
		elseif(isset($mentor2id) and $mentor2id == $row['id']){
			$mentorid = $mentor2id;
			$status = $mentor2status;
		}
		elseif(isset($mentor3id) and $mentor3id == $row['id']){
			$mentorid = $mentor3id;
			$status = $mentor3status;
		}
		else{
			$status = 0;
		}
		
		if($status == 3){
			echo "<td>双方已确认</td><td>无法操作</td>";
		}
		elseif($studentnum == 2){
			echo "<td>已经确定两名学生</td><td>无法操作</td>";
		}
		elseif($num > 3){
			echo "<td></td><td>无法操作</td>";
		}
		elseif($num < 4){
			if($status == 0 and $num < 3){
				echo "<td>未选择</td><td>";
				echo "<form action='sltMtDb.php' method='post'>";
				echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
				echo "<input type='submit' value='选择' class='sltMtDb'/>";
				echo "</form>";
				echo "</td>";
			}
			elseif($status == 1){
				echo "<td>等待导师确认</td><td>";
				echo "<form action='ccMtDb.php' method='post'>";
				echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
				echo "<input type='submit' value='取消' class='ccMtDb' />";
				echo "</form>";
				echo "</td>";
			}
			elseif($status == 2){
				echo "<td>导师已确认</td><td>";
				echo "<form action='rejectMtDb.php' method='post'>";
				echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
				echo "<input type='submit' value='拒绝' class='rejectMtDb'/>";
				echo "</form>";
				echo "<form action='cfMtDb.php' method='post'>";
				echo "<input type='hidden' name='mtid' value='".$row['id']."' />";
				echo "<input type='submit' value='确认' class='cfMtDb' />";
				echo "</form>";
				echo "</td>";
			}
			else{
				echo "<td>已选择3个</td><td>无法操作</td>";
			}
		}
		else{
			echo "<td>无法选择</td><td>无法操作</td>";
		}
 	}
 	else{
		echo "<td>无法选择</td><td>无法操作</td>";
 	}
 	echo "</tr>";
 }
 echo "</table>";
 mysql_close($conn);
?>
 <script src="../js/selectmt.js"></script>
</body>
</html>
