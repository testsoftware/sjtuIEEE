<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
session_start();
if (isset($_SESSION['username'])){	
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	$photo = $_SESSION['photo'];  
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
	exit('error');
}
?>

<link rel="stylesheet" type="text/css" href="../css/imgareaselect-default.css" />
<link rel="stylesheet" type="text/css" href="../css/fileuploader.css" />
<script type="text/javascript" src="../js/fileuploader.js" ></script>
<script type="text/javascript" src="../js/jquery.imgareaselect.pack.js"></script>
<script type="text/javascript" src="../js/ajaxphoto.js"></script>
<style>
#upload{
width:80px;
height:20px;
padding:7px 40px 7px 40px; 
-moz-border-radius:5px;
-webkit-border-radius:5px;
background-image: -moz-linear-gradient(top, #909090, #F0F0F0); /* Firefox */
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0,#F0F0F0), color-stop(1,#909090)); /* Saf4+, Chrome */
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F0F0F0', endColorstr='#909090', GradientType='0'); /* IE*/
}
</style>
<div class="container span8">
  <form  class="form-horizontal" action="cropphoto.php" method="post" id='cropphotoform'>
   <fieldset> 
    <legend>上传照片</legend>
    <img  id="myphoto" class="span7" style="width:360px;" <?php echo "src='../".$photo."'"; ?> />
    <div class="span5 offset2 control-group" style="margin-top:30px;">
     <span class="alert-success alert" id="status">请先上传照片,再剪切</span>
    </div>
    
    <div class="span4 offset1 control-group">
      <button type="button" class="btn btn-warning">
     <i class="icon-exclamation-sign icon-white"></i>返回   </button>
    <input class="btn btn-success" id="myphotosubmit" type="submit" value="提交" disabled="false"> </input>
     <div id="uploadphoto">上传图片</div>
     <input type="hidden" name="x1" value="" />
     <input type="hidden" name="y1" value="" />
     <input type="hidden" name="x2" value="" />
     <input type="hidden" name="y2" value="" />
     <input type="hidden" name="photopath" value="" />
    </div>
    
  </fieldset>
 </form>
</div> <!-- /container -->
<script>
window.onload=ajaxupload();
</script>
