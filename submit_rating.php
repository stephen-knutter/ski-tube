<?php
	session_start();
	include_once('ski_db_fns.php');
	
	$id = $_POST['id'];
	$rating = $_POST['rating'] / 2;
	$comment = $_POST['commentBox'];
	
	echo $id.'<br/>';
	echo $rating.'<br/>';
	echo $comment.'<br/>';
	echo $_SESSION['logged_user'];
	
	if(isset($_SESSION['logged_user'])){
		$conn = db_connect();
	
		$query = "INSERT INTO ratings VALUES('NULL', '".$id."', '".$rating."', '1', '".$comment."', '".$_SESSION['logged_user']."', NOW())";
		if($result = $conn->query($query)){
			header('Location: watch_video.php?video='.$id);
			exit();
		} else {
			echo '<p style="color: red; font-size: 12px;"><a href="watch_video.php?video='.$id.'" style="color: red; font-size: 12px;">&#8592;Back</a> Internal server error</p>';
		}
	} else {
		header('Location: watch_video.php?video='.$id);
		exit();
	}
?>