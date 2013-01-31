<?php
session_start();
if(isset($_SESSION['id'])){
	unlink($_POST['photopath']);
}
?>