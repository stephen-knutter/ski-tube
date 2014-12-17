<?php
	include_once('ski_db_fns.php');
	require_once('youtube.php');
	session_start();
	$current = isset($_GET['page']) ? $_GET['page'] : 1;
	$results_per_page = 6;
	$start = (($current - 1) * $results_per_page);
	$end = 6 * $current;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gone Skiing</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./images/skier.jpg">
	<link rel="stylesheet" type="text/css" href="./css/header.css" />
	<link rel="stylesheet" type="text/css" href="./css/skiing.css" />
	<link rel="stylesheet" type="text/css" href="./css/footer.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/ski-tube.js"></script>
</head>
<body>
	
	<?php
		do_header();
		do_logged_user();
	?>
	
	<div id="mainWrap">
		<div id="videos">
			<ul id="videoList">
				<?php
					youtube_videos($start, $end);
				?>
			</ul>
			<?php
				$total_pages = ceil(get_count() / 6);
				echo generate_page_links($current, $total_pages);
			?>
		</div>
		
		<div id="add">
			<a href="#"><img src="./images/mnt-collective.jpg" alt="Gone Skiing Add" /></a>
			
			<ul id="footerList">
				<li id="copyright">&copy;Stephen Knutter</li>
				<li><a href="http://www.stephenknutter.com">Home</a></li>
				<li><a href="http://www.stephenknutter.com">About</a></li>
				<li><a href="http://www.stephenknutter.com">Contact</a></li>
			</ul>
		</div>
	</div>
</body>
</html>