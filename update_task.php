<?php
	require_once 'bd.php';
 
	if($_GET['task_id'] != ""){
		$task_id = $_GET['task_id'];
        
        echo $_GET['task_id'];
 
		$conn->query("UPDATE `todo` SET `status` = 'Done' WHERE `task_id` = $task_id") or die(mysqli_errno($conn));
		header('location: index.php');
	}
?>