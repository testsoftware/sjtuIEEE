<?php
session_start();
if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $id = $_SESSION['id'];
  $conn=mysql_connect("localhost","IEEE","IEEE2011")  or die("Could not connect: " . mysql_error());
  mysql_select_db("IEEE",$conn);
  mysql_query("SET NAMES UTF8",$conn); 
  $sql= mysql_query("SELECT * FROM mentor where id='$id'");
  $row = mysql_fetch_assoc($sql);
  $major = $row['专业'];
  $intro = $row['简介'];
  $homepage = $row['个人主页'];
  $email = $row['email'];
  $office = $row['办公室'];  
  $photo = $row['photo'];           
  mysql_close($conn);
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
<title><?php echo $username; ?></title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
<!--[if IE]>
<style  type="text/css">
  .ie_show { display:block }
  .ie_hide { display:none }
</style>
<![endif]-->
</head>
<body>
  <div class="navbar navbar-fixed-top navbar-inverse">
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
            <a href="logout.php"><button class="btn btn-success pull-right">登出</button></a>
            <p class="navbar-text pull-right">
              <?php echo "<img src='../".$row['photo']."' style=\"height:30px;\" />"; ?>
              <i class="icon-user icon-white"></i>
              <?php echo $id."&nbsp;" ?>
            </p>
          </div>
        </div>
      </div>
  </div>
<br />
<br />
<br />
<br />
  <div class="container">
  <div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#1" data-toggle="tab"><h3>个人信息</h3></a></li>
      <li id="sltRecordSt"><a href="#2" data-toggle="tab">查看已选您的学生</a></li>
      <li id="myStudent"><a href="#3" data-toggle="tab">我的学生</a></li>
      <li id="mentorUpdate"><a href="#4" data-toggle="tab">修改个人信息</a></li>
      <li><a href="pwd.php">修改密码</a></li>
      <li><a href="../index.php">返回</a></li>
   </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="1">
        <div class="hero-unit">
          <div class="row">
            <div class="span5">
            <table class="table table-hover">
            <tr>
              <td>姓名</td>
              <td>
                <?php echo $username ?>
              </td>
            </tr>
            <tr >
              <td>工号</td>
              <td>
                 <?php echo $id ?>
              </td>
            </tr>
            <tr>
              <td>专业</td>
              <td>
                <?php echo $major ?>
              </td>
            </tr>
            <tr>
              <td>简介</td>
              <td>
                <?php echo $intro ?>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>
                <?php echo $email ?>
              </td>
            </tr>  
            <tr>
              <td>个人主页</td>
              <td>
                <?php echo $homepage ?>
              </td>
            </tr>         
            <tr>
              <td>办公室</td>
              <td>
                <?php echo $office ?>
              </td>
            </tr>
            </table>
            </div>
            <div class="span3 offset1">
              <?php echo "<img src='../".$photo."' />"; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="2">
        <!-- <a href="sltRecordSt.php">sltRecordSt.php</a> -->
      </div>
      <div class="tab-pane" id="3">
        <!-- <a href="myStudent.php">myStudent.php</a> -->
      </div>
      <div class="tab-pane" id="4">
   <!--      <div class="container">
          <div class="page-header">
            <h3>修改个人信息</h3>
          </div>
          <form onSubmit="return menUpdateInfo(this)" action="mentorUpdateDb.php" method="post" class="form-horizontal" enctype="multipart/form-data">
           <fieldset>
    <div class="control-group">
      <label class="control-label" for="id">工号</label>
      <div class="controls">
        <label class="control-label" for="id"><?php echo $id;?></label>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="username">姓名</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="username" <?php if(!empty($username)) {echo "value=".$username;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="major">专业</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="major" <?php if(!empty($major)) {echo "value=".$major;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="homepage">个人主页</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="homepage" <?php if(!empty($homepage)) {echo "value=".$homepage;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="intro">简介</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="intro" <?php if(!empty($intro)) {echo "value=".$intro;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input type="email" class="input-xlarge" name="email" <?php if(!empty($email)) {echo "value=".$email;} ?> required/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="office">办公室</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="office" <?php if(!empty($office)) {echo "value=".$office;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="homepage">照片</label>
      <div class="controls">
        <input type="file" name="file" id="file" class="hide ie_show"/>   
        <div class="input-append ie_hide">
          <input id="pretty-input" class="input-large" type="text" />
          <a id = "browse" class="btn">Browse</a>
        </div>
    </div>
    <div class="form-actions">
      <input class="btn btn-success" type="submit" value="修改我的个人信息" />
      <a class="btn" href="mentorSelf.php">取消</a>
    </div>
            </fieldset>
          </form>
        </div> <!-- /container --> -->
      </div>
    </div>  
  </div>
  </div>
<br />
<br />
  <div id="footer">
    <div class="container">
      <p class="muted credit">Provided by <a href=#>yamamaki</a> </p>
    </div>
  </div>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../js/mentorSelf.js"></script>
</body>
</html>