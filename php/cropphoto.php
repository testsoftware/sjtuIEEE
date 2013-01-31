<?php 
session_start();
if(isset($_SESSION['id'])){
	$idtype = $_SESSION['idtype'];
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
	
function resizeImage($popimage, $tmpimage,$popwidth,$popheight, $width, $height, $x1, $y1,$type,$id,$username){
	$newImageWidth = ceil($popwidth);
	$newImageHeight = ceil($popheight);
	$newimage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($type){
		case 'gif': $source= imagecreatefromgif($tmpimage); break;
		case 'jpg': $source = imagecreatefromjpeg($tmpimage); break;
		case 'png': $source = imagecreatefrompng($tmpimage); break;
	}
	
	imagecopyresampled($newimage,$source,0,0,$x1,$y1,$newImageWidth,$newImageHeight,$width,$height);
	$grey = imagecolorallocate($newimage, 128, 128, 128);
	$black = imagecolorallocate($newimage, 0, 0, 0);
// 	imagefilledrectangle($im, 0, 0, 399, 29, $white);

	// The text to draw
	// Replace path by your own font path
	$font = '../css/Adobe.otf';
	// Add some shadow to the text
// 	imagestring($newimage,4,270, 460,$text,$black);
	// Add the text
	imagettftext($newimage, 12, 0, 4, 451, $grey, $font,$id);
	imagettftext($newimage, 12, 0, 3, 450, $black, $font,$id);
	imagettftext($newimage, 15, 0, 4, 470, $grey, $font,$username);
	imagettftext($newimage, 15, 0, 3, 469, $black, $font,$username);
	imagejpeg($newimage,$popimage,90);
	chmod($popimage,0644);
	imagedestroy($source);
	imagedestroy($newimage);
}
	//poposize: width:600px;height:800px;
	$tmpimage=$_POST['photopath'];
	$type = substr(strrchr($tmpimage,"."),1);
	if($type == 'jpeg' or $type == 'pjpeg') {
		$type = 'jpg';
	}
	$size = getimagesize($tmpimage);
	$scale = $size[0] / 600;
	$x1=$_POST['x1'] * $scale;
	$x2=$_POST['x2'] * $scale;
	$y1=$_POST['y1'] * $scale;
	$y2=$_POST['y2'] * $scale;
	$popwidth = 360;
	$popheight = 480;
	// $fp = fopen($image, "rwb");
	if($idtype == 'student'){
		$popimage = "photoOfst/".$_SESSION['id'].".jpg";
	}
	else{
		$popimage = "photoOfte/".$_SESSION['id'].".jpg";
	}
	resizeImage("../".$popimage,$tmpimage,$popwidth,$popheight,$x2-$x1,$y2-$y1,$x1,$y1,$type,$id,$username);
	unlink($tmpimage);
	$conn = mysql_connect("localhost","IEEE","IEEE2011") or die("Could not connect:".mysql_error());
	mysql_select_db("IEEE",$conn);
	mysql_query("SET NAMES UTF8");
	$sql = "UPDATE ".$idtype." SET photo='$popimage' WHERE id='$id'";
	if (!mysql_query($sql, $conn)){
		echo "error";
	}
	else{
		echo "success";
		$_SESSION['photo'] = $popimage;
	}
	mysql_close($conn);
}
else{
	echo "nologin";
}
?>