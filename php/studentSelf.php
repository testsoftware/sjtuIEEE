<?php
session_start();
if (isset($_SESSION['id'])){
	if($_SESSION['idtype']!='student'){
		session_destroy();
		exit('You have no authority to access this document,please login again');
	}
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
<!DOCTYPE html>
<html  lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/home.css" rel="stylesheet">
<style type="text/css">
body{
     padding-top: 80px;
     padding-bottom: 40px;
}
</style>
<title><?php echo $username ?></title> 
</head>
<body>
<!-- 最上面一条 -->
<div class="navbar-fixed-top navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><?php echo $username; ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="../index.php">Home</a></li>
            </ul>
             <a href="logout.php" class="btn  btn-info pull-right"> 登出 </a>
            <p class="navbar-text pull-right">
              <?php echo "<img src='../".$photo."' style=\"height:30px;\" />"; ?>
              <a href="#" class="navbar-link" id="id"><?php echo $id; ?></a>
            </p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


        <div class="navvbox">
            <ul class="navvul" >
              <li class="navheader">个人信息</li>
              <li class="activing" id="information"><span>当前信息</span></li>
              <li class="pending" id="updateinfo"><span>更新信息</span></li>
              <li class="pending" id="updatephoto"><span>上传照片</span></li>
              <li class="pending"><a href="../php/pwd.php"><span>修改密码</span></a></li>
              <li class="navheader">导师信息</li>
              <li class="pending"  id="myMentor"><span>我的导师</span></li>
               <li class="pending"  id="mentorList" rel="popover" data-trigger="hover" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title"><span>查看导师</span></li>
              <li class="pending"  id="sltRecordMt"><span>选择状态</span></li>
              <li class="pending"  id="failedMt"><span>失败记录</span></li>
              <li class="navheader">链接</li>
              <li><a href="#"><span>Link</span></a></li>
              <li><a href="#"><span>Link</span></a></li>
              <li><a href="#"><span>Link</span></a></li>
            </ul>
        </div>

        <div class="offset3" id="multiplexdiv">
        </div>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../js/home.js"></script>
    <script>
    //enable
	$('[rel=tooltip]').tooltip();
        $('[rel=popover]').popover();
    </script>
    
    
</body>
</html>