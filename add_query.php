<?php
	require_once 'bd.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
 
			$conn->query("INSERT INTO `todo` VALUES(null, '$task', '')");
			header('location:index.php');
		}
	}
?>