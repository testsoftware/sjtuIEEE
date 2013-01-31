<?php
if($_GET['ISAJAX'] != 'AJAX' ) {
	exit('There are some mistakes in your request. Do not input links directly. Please get access to the page through your homepage!');
}
?>
<!DOCTYPE html>
<html lang='zh-CN'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MentorList</title>
</head>
<body>
<div class="row">
<button class="btn-success btn" id="allmentor">全部导师</button>
<button class="btn-success btn" id="csmentor">计算机系导师</button>
<button class="btn-success btn" id="itmentor">仪器系导师</button>
<button class="btn-success btn" id="atmentor">自动化系导师</button>
<button class="btn-success btn" id="iementor">信息工程系导师</button>
<button class="btn-success btn" id="elmentor">电气系导师</button>
<button class="btn-success btn" id="eementor">电子科技系导师</button>
</div>
<input id="listtype" type="hidden" val="all" />
<div id="mentorlistdiv" style="margin-top:50px;">

</div>
 <script src="../js/mentorlist.js"></script>
</body>
</html>
