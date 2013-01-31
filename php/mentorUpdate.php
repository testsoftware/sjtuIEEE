<?php
session_start();
if (isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='mentorLogin.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MentorInfo</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<?php 
	$con = mysql_connect('localhost', 'IEEE', 'IEEE2011');
	mysql_query('set names utf8');
	$db = mysql_select_db('IEEE', $con);
	$sql = "select * from mentor where id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	$username=$row['姓名'];
  	$major = $row['专业'];
  	$intro = $row['简介'];
  	$homepage = $row['个人主页'];
  	$email = $row['email'];
  	$office = $row['办公室'];  
  	$photo = $row['photo'];
?>
          <div class="page-header">
            <h3>修改个人信息</h3>
          </div>
          <form action="mentorUpdateDb.php" method="post" class="form-horizontal" enctype="multipart/form-data">
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
        <input type="text" class="input-xlarge" name="username" id="username" <?php if(!empty($username)) {echo "value=".$username;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="major">专业</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="major" id="major" <?php if(!empty($major)) {echo "value=".$major;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="homepage">个人主页</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="homepage" id="homepage" <?php if(!empty($homepage)) {echo "value=".$homepage;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="intro">简介</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="intro" id="intro"<?php if(!empty($intro)) {echo "value=".$intro;} ?> />
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input type="email" class="input-xlarge" name="email" id="email" <?php if(!empty($email)) {echo "value=".$email;} ?> required/>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="office">办公室</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="office" id="office" <?php if(!empty($office)) {echo "value=".$office;} ?> />
      </div>
    </div>
    <div class="form-actions">
      <input class="btn btn-success" type="submit" value="修改我的个人信息" id="update" />
      <a class="btn" href="mentorSelf.php">取消</a>
    </div>
            </fieldset>
          </form>

    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../js/mentorSelf.js"></script>
</body>
</html>
