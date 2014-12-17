<?php
	include_once('ski_db_fns.php');
	session_start();
	@$title = $_GET['title'];
	$id = $_REQUEST['video'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	<?php
		if(isset($title)){
			echo $title;
		} else {
			$conn = db_connect();
			$query = "SELECT title FROM videos WHERE id='".$id."'";
			$result = $conn->query($query);
			$row = $result->fetch_array();
			echo $row[0];
		}
	?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./images/skier.jpg">
	<link rel="stylesheet" type="text/css" href="./css/header.css" />
	<link rel="stylesheet" type="text/css" href="./css/skiing.css" />
	<link rel="stylesheet" type="text/css" href="./css/footer.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/stars.js"></script>
	<script type="text/javascript" src="./js/ski-tube.js"></script>
</head>
<body>
	<?php
		do_header();
		do_logged_user();
	?>
	
	<div id="wrap">
		<?php
			echo '<div id="fullMovie"><iframe width="100%" height="500" src="//www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe></div>'
		?>
		
		<div id="desc">
			<?php
				$conn = db_connect();
				$query = "SELECT description FROM videos WHERE id='".$id."'";
				$result = $conn->query($query);
				if($result->num_rows > 0){
					$row = $result->fetch_assoc();
					$desc = substr($row['description'], 0, 200);
					echo $desc . '...';
				}
			?>
		</div>
		
		<form action="submit_rating.php" method="post">
		<input type="hidden" name="id"  value="<?php echo $id; ?>">
		<div id="review">
			<div class="stars">
				<label for="rating-1"><input id="rating-1" name="rating" type="radio" value="1" />1</label>
		        <label for="rating-2"><input id="rating-2" name="rating" type="radio" value="2" />2</label>
		        <label for="rating-3"><input id="rating-3" name="rating" type="radio" value="3" />3</label>
		        <label for="rating-4"><input id="rating-4" name="rating" type="radio" value="4" />4</label>
		        <label for="rating-5"><input id="rating-5" name="rating" type="radio" value="5" />5</label>
		        <label for="rating-6"><input id="rating-6" name="rating" type="radio" value="6" />6</label>
		        <label for="rating-7"><input id="rating-7" name="rating" type="radio" value="7" />7</label>
		        <label for="rating-8"><input id="rating-8" name="rating" type="radio" value="8" />8</label>
				<label for="rating-9"><input id="rating-9" name="rating" type="radio" value="9" />9</label>
				<label for="rating-10"><input id="rating-10" name="rating" type="radio" value="10" />10</label>
			</div>
			<div id="loginOrsignup">
				<?php
					if(!isset($_SESSION['logged_user'])){
						echo '<a href="register.php?video='.$id.'">Login/Register to Review</a>';
					}
				?>
			</div>
			<div class="comment">
				<textarea id="commentBox" name="commentBox" maxlength=255></textarea>
			</div>
			<div><input type="submit" name="submitRating" id="submitRating" value="Submit Review"></div>
		</div>
		</form>
	
		<div id="userReviews">
			<div id="outOfRating">
				<?php
					get_rating($id, false);
				?>
			</div>
			<div id="reviewBanner"><p>User Reviews:</p></div>
			<div id="reviews">
				<?php
					$conn = db_connect();
					$query = "SELECT * FROM ratings WHERE video_id='".$id."' ORDER BY time DESC";
					$result = $conn->query($query);
					while($row = $result->fetch_assoc()){
						echo '<div class="backRating">'.get_rating($row['video_id']).'</div>';
						$dateTime = new DateTime($row['time']);
						$dateTime = date_format($dateTime, 'g:ia \o\n l jS F Y');
						echo '<div class="singleReview">' . $row['user']. ' @ ' . $dateTime . '</div>';
						echo $row['comment'];
						echo '<hr/>';
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>