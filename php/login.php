<?php
session_start();
if (isset($_SESSION['idtype'])){
    echo "<script>window.location.href='".$_SESSION['idtype']."Self.php'</script>";
}	
?>
<!DOCTYPE html>
<html lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="上海交通大学IEEE试点班">
<meta name="keywords" content="上海交通大学 上海交大 交大 IEEE 试点班 创新">
<meta name="author" content="F11.IEEE试点班@SJTU">-->

<link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">

<style type="text/css">
      body {
        padding-top: 120px;
        padding-bottom: 40px;
      }
</style>

<title>login</title>
</head>
<body>

<!-- 最上面一条 -->
<div class="navbar navbar-inverse navbar-fixed-top">
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
              <li><a href="../index.php">Home</a></li>
              <li class='active'><a href="login.php">Login</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>
    
  <div class="row well">
    <!--   login form -->
    <div class="span4 well offset2 " style="position:relative;top:30px;">
     <fieldset>
     <legend><i class="icon-hand-right"></i>I'm an IEEEer!</legend>
   <form class="form-inline" action="loginDb.php" id="loginform" method="post" onsubmit="ajaxlogin();return false;">    
   <!--      idtype -->
    <div class="control-group pull-right">
    <div class="controls input-prepend">
    <span class="add-on">身份</span>
	<select name='type' id="identify" onchange="setName(this.options[this.selectedIndex].innerHTML)">
	<option>学生</option>
	<option>教授</option>
	</select>
    </div>
    </div>
  <!--   id -->
  <div class="control-group pull-right">
     <div class="input-prepend controls">
     <span class="add-on" id="identifyName">学号</span>
      <input type="text" name="id" placeholder="学号"></input>
    </div>
  </div>
  <!--   password -->
  <div class="control-group pull-right">
  <div class="input-prepend controls">
   <span class="add-on">密码</span>
      <input type="password" name='pwd' id='pwd' placeholder="密码"></input>
    </div>
  </div>
  <!-- button -->
  <div class="control-group pull-right">
    <div class="controls">
    <button type="button" class="btn btn-warning">
    <i class="icon-exclamation-sign icon-white"></i>
    忘记密码
    </button>
    <button type="submit" class="btn btn-success" id="statusofprocess">
    <i class="icon-ok icon-white"></i>
    登录
    </button>
    
    
    </div>
    </div>
   </form>
   </fieldset>
  </div>
  
  
  <div class="span7 well offset1">
  <div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
    <img src='../img/1.jpg' >
    <div class="carousel-caption">
                      <h4>包玉刚图书馆</h4>
                      <p>
                      人文气息
                      </p>
                    </div>
    </div>
    <div class="item">
    <img src='../img/2.jpg'>
    <div class="carousel-caption">
                      <h4>湖<h4>
                      <p>
                      交大很多湖
                      </p>
                    </div>
    </div>
    <div class="item">
    <img src='../img/3.jpg'>
    <div class="carousel-caption">
                      <h4>新图书馆</h4>
                      <p>
                      理工天下
                      </p>
                    </div>
    </div>
  </div>
  
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
  </div>
  </div>
  </div>  
    </div>
    
    <footer class="footer well" style="position:relative;top:100px;">
      <div class="container">
      <div class="row">
      <div class="span3">
	<header>
	<h3>About</h3>
	</header>
	<p>
	如果您有什么建议，请联系我们。
	<br />
	Email:*********@xx.com
	<br />
	感谢对我们的关注！	
	</p>
	</div>
	 <div class="span3 offset1">
	<header>
	<h3>本站链接</h3>
	</header>
	<ul>
	<li><a href="../index.php">主页</a></li>
	<li><a href="../php/MentorList.php">导师</a></li>
	<li><a href="#">Submit</a></li>
	<li><a href="#">Suggestion</a></li>
	</ul>
	</div>
	 <div class="span3 offset1">
	<header>
	<h3>友情链接</h3>
	</header>
	<ul>
	<li><a href="http://www.sjtu.edu.cn/">交大主页</a></li>
	<li><a href="http://www.seiee.sjtu.edu.cn/">交大电院</a></li>
	<li><a href="http://www.ieee.org/index.html">IEEE</a></li>
	<li><a href="http://cn.ieee.org/">IEEE中国</a></li>
	</ul>
	</div>
     </div>
    </footer>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../js/ajaxlogin.js"> </script>

</body>
</html>
