<?php
session_start();
if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $id = $_SESSION['id'];
  $idtype = $_SESSION['idtype'];
  $photo = $_SESSION['photo'];  
  if($idtype == 'student'){
	$navbar = "<div class='navbar navbar-fixed-top'>";
	$btn = "<button class='btn btn-info pull-right'>";
  }
  else{
	$navbar = "<div class='navbar navbar-fixed-top navbar-inverse'>";
	$btn = "<button class='btn btn-success pull-right'>";
  }
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
<style type="text/css">
body{
	padding-top:50px;
	padding-left:50px;
}
.thick {font-weight:bold;}
</style>
</head>
<body>
<?php 
echo $navbar;
?>
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">IEEE试点班</a>
          <div class="nav-collapse collapse">
          <ul class="nav">
            <li><a href="#">首页</a></li>
            <li class="active"><a href="#">个人信息</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <a href="logout.php"><?php echo $btn; ?>登出</button></a>
            <p class="navbar-text pull-right">
                  <?php echo "<img src='../".$photo."' style=\"height:30px;\" />"; ?>
              <i class="icon-user icon-white"></i>
              <a href="../php/login.php" class="navbar-link" id="id"><?php echo $id; ?></a>
            </p>
          </div>
        </div>
      </div>
  </div>
<br />
<br />


<div class="container">
  <div class="page-header">
    <h3>修改密码</h3>
  </div>
  <form action="../php/pwdDb.php"  class="form-horizontal" method="post" id='pwdform' onsubmit="pwdTest();return false;">
  <fieldset>
    <div class="control-group">
      <label class="control-label" for="pwd">原密码</label>
      <div class="controls">
        <input type="password" class="input-xlarge" name="pwd" placeholder="原密码" id="pwd" />
        <span class="alert" id="pwdCor" style="display:none"></span>
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="newPwd">新密码</label>
      <div class="controls">
        <input type="password" class="input-xlarge" name="newPwd" placeholder="新密码"  id="newPwd"/>
        <span class="alert" id="pwdRank" style="display:none"></span>
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="newPwd2">重复新密码</label>
      <div class="controls">
        <input type="password" class="input-xlarge" name="newPwd2" placeholder="重复新密码"  id="newPwd2" disabled="true" />
        <span class="alert" id="pwdSame" style="display:none"></span>
      </div>
    </div>
     
    <div class="form-actions">
      <input class="btn btn-danger" type="submit" id="submit" value="修改密码" disabled="true"/>
      <a class="btn" href="login.php">取消</a>
    </div>
    
  </fieldset>
</form>
<br />
<br />
<!--<div id="footer">
  <div class="container">
    <p class="muted credit">Provided by <a href=#>yamamaki</a> </p>
  </div>
</div>-->
</div> <!-- /container -->

<script src="../assets/js/jquery-1.8.3.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../js/pwdRank.js"></script>
<script src="../js/pwdTest.js"></script>

</body>
</html>
