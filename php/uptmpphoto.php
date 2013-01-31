<?php
session_start();
if(isset($_SESSION['id'])){
	$allowedExtensions = array("jpeg","jpg","png","gif","pjpeg");
	$sizeLimit =   7*1024* 1024;
	require('../php/uploaderclass.php');
	$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	$result = $uploader->handleUpload('../tmp/');
	echo htmlspecialchars(json_encode($result),ENT_NOQUOTES);
	
	}
else{
	echo htmlspecialchars(json_encode(array('error'=>'nologin')),ENT_NOQUOTES);
}
?>