<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
session_start();
function setselect($subject,$direction){
	switch($subject){
			case '自动化':
				if($direction=='网络系统与控制'){
					echo "<option selected='selected'>网络系统与控制</option><option>智能机器人</option><option>图像信息处理与模式分析</option>";
				}
				elseif($direction=='智能机器人'){
					echo "<option>网络系统与控制</option><option selected='selected'>智能机器人</option><option>图像信息处理与模式分析</option>";
				}
				else{
					echo "<option>网络系统与控制</option><option>智能机器人</option><option selected='selected'>图像信息处理与模式分析</option>";
				}
				break;
			case '计算机科学与技术':
				if($direction=='机器学习'){
					echo "<option selected='selected'>机器学习</option><option>数据工程</option><option>网络计算</option>";
				}
				elseif($direction=='数据工程'){
					echo "<option>机器学习</option><option selected='selected'>数据工程</option><option>网络计算</option>";
				}
				else{
					echo "<option>机器学习</option><option>数据工程</option><option selected='selected'>网络计算</option>";
				}
				break;
			case '电气工程与自动化':
				if($direction=='电力系统及其自动化'){
					echo "<option selected='selected'>电力系统及其自动化</option><option>高电压与绝缘技术</option><option>电力电子与电机技术</option>";
				}
				elseif($direction=='高电压与绝缘技术'){
					echo "<option>电力系统及其自动化</option><option selected='selected'>高电压与绝缘技术</option><option>电力电子与电机技术</option>";
				}
				else{
					echo "<option>电力系统及其自动化</option><option>高电压与绝缘技术</option><option selected='selected'>电力电子与电机技术</option>";
				}
				break;
			case '信息工程':
				if($direction=='多媒体信息处理'){
					echo "<option selected='selected'>多媒体信息处理</option><option>通信与网络</option><option>信息安全</option>";
				}
				elseif($direction=='通信与网络'){
					echo "<option>多媒体信息处理</option><option selected='selected'>通信与网络</option><option>信息安全</option>";
				}
				else{
					echo "<option>多媒体信息处理</option><option>通信与网络</option><option selected='selected'>信息安全</option>";
				}
				break;
			case '电子科学与技术':
				if($direction=='应用电路设计'){
					echo "<option selected='selected'>应用电路设计</option><option>微波射频系统分析</option><option>半导体材料与显示照明</option>";
				}
				elseif($direction=='微波射频系统分析'){
					echo "<option>应用电路设计</option><option selected='selected'>微波射频系统分析</option><option>半导体材料与显示照明</option>";
				}
				else{
					echo "<option>应用电路设计</option><option>微波射频系统分析</option><option selected='selected'>半导体材料与显示照明</option>";
				}
				break;
			case '仪器科学与技术':
				if($direction=='传感器与检测技术'){
					echo "<option selected='selected'>传感器与检测技术</option><option>现代仪器技术</option><option>导航与定位</option>";
				}
				elseif($direction=='现代仪器技术'){
					echo "<option>传感器与检测技术</option><option selected='selected'>现代仪器技术</option><option>导航与定位</option>";
				}
				else{
					echo "<option>传感器与检测技术</option><option>现代仪器技术</option><option selected='selected'>导航与定位</option>";
				}
				break;
			default:
				if($direction=='网络系统与控制'){
					echo "<option selected='selected'>网络系统与控制</option><option>智能机器人</option><option>图像信息处理与模式分析</option>";
				}
				elseif($direction=='智能机器人'){
					echo "<option>网络系统与控制</option><option selected='selected'>智能机器人</option><option>图像信息处理与模式分析</option>";
				}
				else{
					echo "<option>网络系统与控制</option><option>智能机器人</option><option selected='selected'>图像信息处理与模式分析</option>";
				}
		}
}
if (isset($_SESSION['username'])){	
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];
	$idtype = $_SESSION['idtype'];
	$photo = $_SESSION['photo'];
	$con = mysql_connect('localhost', 'IEEE', 'IEEE2011');
	mysql_query('set names utf8');
	$db = mysql_select_db('IEEE', $con);
	$sql = "select * from student where id='$id'";
	$res = mysql_query($sql);
	if (!$res){
		die("Could not successfully run query ($sql) from database" . mysql_error());
	} 
	else{
		$row = mysql_fetch_assoc($res);
		$class = $row['班级'];
		$grade = $row['年级'];
		$gpa = $row['学积分'];
		$rank = $row['排名'];
		$introduction = $row['简介'];
		$numfcourse = $row['挂科数'];
		$namefcourse = explode('<<<split@#0Gq~%]wWsplit>>>',$row['挂科科目']);
		$whyfcourse = explode('<<<split@#0Gq~%]wWsplit>>>',$row['挂科说明']);
		$majorsubject = $row['主修专业'];
		$majordirection = $row['主修方向一'];
		$majordirection2 = $row['主修方向二'];
		$minorsubject = $row['辅修专业'];
		$minordirection = $row['辅修方向'];
		$email=$row['email'];
		$phone=$row['手机号码'];
	}
	mysql_close($con);
}
else{
	echo "<script>alert('请登录!');</script>";
	echo "<script>window.location.href='login.php'</script>";
}
?>

<script type="text/javascript" src="../js/studentUpdate.js"></script>

<div class="container span8">
  <form action="../php/studentUpdateDb.php" class="form-horizontal" method="post" id="studentUpdateform">
   <fieldset> 
    <legend>基本信息</legend>
    <div class="control-group">
      <label class="control-label" for="class">班级</label>
      <div class="controls">
	<input type='text' name='class' class="input-xlarge"  placeholder="班级" <?php if(!empty($class)) {echo "value=".$class;} ?> /> <br /> 
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="grade">年级</label>
       <div class="controls">
	<select name="grade">
	<option <?php if($grade=='大一') {echo "selected='selected'";} ?> >大一</option>
	<option <?php if($grade=='大二') {echo "selected='selected'";} ?>>大二</option>
	<option <?php if($grade=='大三') {echo "selected='selected'";} ?>>大三</option>
	<option <?php if($grade=='大四') {echo "selected='selected'";} ?>>大四</option>
	</select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="gpa">学积分</label>
      <div class="controls">
	<input type='text' name='gpa' class="input-xlarge"  placeholder="学积分" <?php if(!empty($gpa)) {echo "value=".$gpa;} ?> /> <br /> 
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="rank">排名</label>
      <div class="controls">
	<input type='text' name='rank'  class="input-xlarge"  placeholder="排名" <?php if(!empty($rank)) {echo "value=".$rank;} ?> /> <br /> 
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="introduction">简介</label>
      <div class="controls">
	<textarea type='text' name='introduction' rows="10" class="span4"> <?php if(!empty($introduction)) {echo $introduction;} else {echo "300字以内（注重个人擅长/特长/爱好，所获奖励及荣誉，包括中学期间）";}?> </textarea><br /> 
      </div>
    </div>
    
     <div class="control-group">
      <label class="control-label" for="phone">手机</label>
      <div class="controls">
	<input type='text' name='phone' id='phone' class="input-xlarge"  placeholder="手机号码" <?php if(!empty($phone)) {echo "value=".$phone;} ?> /> <br /> 
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="email">邮箱</label>
      <div class="controls">
        <input type="email" class="input-xlarge" name="email" placeholder="@"  id="email" <?php if(!empty($email)) {echo "value=".$email;}?>  />
      </div>
    </div>
    <br />
    <br />
    </fieldset> 
    
    
    <fieldset> 
    <legend>修业信息</legend>
     <div class="control-group">
      <label class="control-label" for="majorcourse">主修方向</label>
      <div class="controls">
<!--       要一个js判断 -->
	<select name="majorsubject">
	<option <?php if($majorsubject=='自动化') {echo "selected='selected'";} ?>>自动化</option>
	<option <?php if($majorsubject=='仪器科学与技术') {echo "selected='selected'";} ?>>仪器科学与技术</option>
	<option <?php if($majorsubject=='信息工程') {echo "selected='selected'";} ?>>信息工程</option>
	<option <?php if($majorsubject=='计算机科学与技术') {echo "selected='selected'";} ?>>计算机科学与技术</option>
	<option <?php if($majorsubject=='电气工程与自动化') {echo "selected='selected'";} ?>>电气工程与自动化</option>
	<option <?php if($majorsubject=='电子科学与技术') {echo "selected='selected'";} ?>>电子科学与技术</option>
	</select>
<!-- 	根据上面选择变化 -->
	<select name="majordirection">
	<?php
		setselect($majorsubject,$majordirection);
	?>
	</select>
	<select name="majordirection2" class="offset2">
	<?php
		setselect($majorsubject,$majordirection2);
	?>
	</select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="minorcourse">辅修方向</label>
      <div class="controls">
	<select name="minorsubject">
	<option <?php if($minorsubject=='自动化') {echo "selected='selected'";} ?>>自动化</option>
	<option <?php if($minorsubject=='仪器科学与技术') {echo "selected='selected'";} ?>>仪器科学与技术</option>
	<option <?php if($minorsubject=='信息工程') {echo "selected='selected'";} ?>>信息工程</option>
	<option <?php if($minorsubject=='计算机科学与技术') {echo "selected='selected'";} ?>>计算机科学与技术</option>
	<option <?php if($minorsubject=='电气工程与自动化') {echo "selected='selected'";} ?>>电气工程与自动化</option>
	<option <?php if($minorsubject=='电子科学与技术') {echo "selected='selected'";} ?>>电子科学与技术</option>
	</select>
	<select name="minordirection">
	<?php
		setselect($minorsubject,$minordirection);
	?>
	</select>
      </div>
    </div>
    <br />
    <br />
    </fieldset> 
    <fieldset> 
    
    <legend>挂科</legend>
    <div class="control-group">
      <label class="control-label" for="numfcourse">挂科数</label>
      <div class="controls">
	<input type='text' name='numfcourse'  class="input-xlarge"  placeholder="输入数字" <?php echo "value=".$numfcourse; ?> /> <br /> 
	<input type='hidden' id="originnum" name="originnum" value=<?php echo $numfcourse; ?> />
      </div>
    </div>
    
<?php
$i = 1;
for($i=1;$i<=$numfcourse;$i++){
  echo  "<div class='control-group'><label class='control-label' for='namefcourse'>挂科科目</label><div class='controls'><input type='text' name='namefcourse".$i."' class='input-xlarge'  placeholder='挂科科目' value='".$namefcourse[$i-1]."'/> <br /> </div></div><div class='control-group'><label class='control-label' for='whyfcourse'>挂科说明</label><div class='controls'><textarea type='text' name='whyfcourse".$i."' rows='4' class='span4'>".$whyfcourse[$i-1]."</textarea><br /></div></div>";
}
?>
    <div id="addcourse">
    </div>
    <br />
    <br />

    <div class="form-actions">
      <input class="btn btn-danger" type="submit" value="更改"/>
      <a class="btn" href="login.php">取消</a>
    </div>

    </fieldset> 
  </form>
</div>