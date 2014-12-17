<?php
	function db_connect(){
	
		$conn = new mysqli('localhost', '', '', '');
		if(!$conn){
			return false;
		}

	return $conn;
	}
	
	function do_header(){
	
?>
	<div id="header">
		<p id="logo"><a href="index.php">Gone Skiing</a></p>
	</div>
<?php
}

function do_logged_user(){
	if(isset($_SESSION['logged_user'])){
		echo '<div id="sessionUser">' . $_SESSION['logged_user'] . ' <a href="logout.php" id="sessionButton"> Logout</a></div>'; 
	}
}

function validate_username($username){
		if( (strlen($username) >= 6) && (strlen($username) <= 16) ){
			return true;
		} else {
			return false;
		}
	}
	
	function validate_email($email){
		if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
			return true;	
		} else {
			return false;
		}
	}
	
	function validate_password($pass){
		if( (strlen($pass) >= 6) && (strlen($pass) <= 16)){
			return true;
		} else {
			return false;
		}
	}
	
	function get_rating($id, $front=true){
		$conn = db_connect();
		$query = "SELECT * FROM ratings WHERE video_id='".$id."'";
		$result = $conn->query($query);
		if($result->num_rows){
			$vote='';
			$votes= (int)0;
			while($row = $result->fetch_assoc()){
				$vote .= (float)$row['vote'];
				$votes++;
			}
				$total = $vote / $votes;
				$total = number_format($total, 2, '.', '');
			if($front){
				return $total;
			} else {
				if($votes == 1){
					$end = ' vote';
				} else {
					$end = ' votes';
				}
				echo $total . ' out of 5 (' . $votes . $end .')';
			}
		} else {
			return '0.00';
		} 
	}
	
	function generate_page_links($cur_page, $num_pages){
			$page_links = '';
			
			$page_links .= '<div class="pageLinks">';
			if($cur_page > 1){
				$page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page - 1) . '">&#9668;</a>';
			} else {
				$page_links .= '&#9668; ';
			}
			
			for($i=1; $i <= $num_pages; $i++){
				if($cur_page == $i){
					$page_links .= ' ' . $i;
				} else {
					$page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . $i . '</a>';
				}
			}
			
			if($cur_page < $num_pages){
				$page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page + 1) . '">&#9658;</a>';
			} else {
				$page_links .= ' &#9658;';
			}
			
			$page_links .='</div>';
			return $page_links;
		}
?>