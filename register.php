<?php
	include_once('ski_db_fns.php');
	session_start();
	@$id = $_REQUEST['video'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="./images/skier.jpg">
	<link rel="stylesheet" type="text/css" href="./css/header.css" />
	<link rel="stylesheet" type="text/css" href="./css/skiing.css" />
	<link rel="stylesheet" type="text/css" href="./css/footer.css" />
</head>
<body>
	<?php
		if(isset($_SESSION['logged_user'])){
			header('Location: index.php');
			exit();
		}
		do_header();
	?>
	
	<?php
		/*CHECK LOGIN FORM*/
		if(isset($_POST['login'])){
			$conn = db_connect();
			$errors = array();
			$email = $conn->real_escape_string(trim($_POST['email']));
			$password = $conn->real_escape_string(trim($_POST['password']));

			if(!empty($email) && !empty($password)){
				/*EMAIL VALIDATION*/
				if(!(validate_email($email))){
					$errors['email'] = 'Not a valid email address';
				}
				
				if(!validate_password($password)){
					$errors['pass'] = 'Password must be between 6 & 16 characters';
				}
				
			} else {
				$errors['empty'] = 'Form not filled out completely';
			}
			
			if(empty($errors)){
				$query = "SELECT * FROM users WHERE email='".$email."' AND password=sha1('".$password."')";
				$result = $conn->query($query);
				if($result->num_rows > 0){
					$row = $result->fetch_assoc();
					$_SESSION['logged_user'] = $row['username'];
					header('Location: watch_video.php?video='.$id);
					exit();
				} else {
					$errors['match'] = 'Wrong combination of username and password';
				}
			}
			
			if(!empty($errors)){
				echo '<ul id="alertList" class="loginAlert">';
			
				foreach($errors as $key=>$value){
					echo '<li>' . $value . '</li>';
				}
				
				echo '</ul>';
			}
		}
	?>
	<div id="regWrap">
		<div id="loginForm">
			<h3>Login</h3>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="video" value="<?php echo $id; ?>">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" /><br/>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" /><br/>
				<input type="submit" name="login" id="loginButton" value="Login" />
			</form>
		</div>
		
		<?php
			/*CHECK REGISTRATION FORM*/
			if(isset($_POST['signUp'])){
				$conn = db_connect();
			
				$username = $conn->real_escape_string(trim($_POST['username']));
				$email = $conn->real_escape_string(trim($_POST['email']));
				$pass1 = $conn->real_escape_string(trim($_POST['password']));
				$pass2 = $conn->real_escape_string(trim($_POST['confirm']));
				
				if(!empty($username) && !empty($email) && !empty($pass1) && !empty($pass2)){
					if(!(validate_username($username))){
						$errors['username'] = 'Username must be between 6 & 16 characters';
					}
					
					if(!validate_email($email)){
						$errors['email'] = 'Email address is not valid';
					}
					
					if($pass1 != $pass2){
						$errors['pass'] = 'Passwords do not match';
					} else {
						if(!validate_password($pass1)){
							$errors['pass'] = 'Password must be between 6 & 16 characters';
					}
				  }
				} else {
					$errors['empty'] = 'Form not filled out completely';
				}
				
				
				if(empty($errors)){
					$query = "SELECT * FROM users WHERE username='".$username."' OR email='".$email."'";
					$result = $conn->query($query);
					if($result->num_rows == 0){
						$query_insert = "INSERT INTO users VALUES('NULL', '".$username."', '".$email."', sha1('".$pass1."'))";
						if($result_insert = $conn->query($query_insert)){
							$_SESSION['logged_user'] = $username;
							header('Location: watch_video.php?video='.$id);
							exit();
						} else {
							$alert = '<div id="alert">
								<p id="alertText">Internal Server Error</p>
							</div>';
							echo $alert;
						}
					} else {
						$errors['username'] = 'Combination of Username and Email has been taken';
						$alert = '<div id="alert">
						<p id="alertText">' .$errors['username']. '</p>
						</div>';
				echo $alert;
					}
				} else {
					$num = count($errors);
			
				if($num == 1){
					$errorText = ' error';
				} else {
				$errorText = ' errors';
				}
			
				$alert = '<ul id="alertList" class="loginAlert">';
						
				if(isset($errors['empty'])){
					$alert .= '<li>'.$errors['empty'].'</li>';
				}
			
				if(isset($errors['username'])){
					$alert .= '<li>'.$errors['username'].'</li>';
				}
						
				if(isset($errors['email'])){
					$alert .= '<li>'.$errors['email'].'</li>';
				}
						
				if(isset($errors['pass'])){
					$alert .= '<li>'.$errors['pass'].'</li>';
				}
						
				$alert .= '</ul>';
				echo $alert;
			}
				
			
		}
		?>
		<div id="registerForm">
			<h3>Register</h3>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="video" value="<?php echo $id; ?>">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" value="<?php if(isset($username)) echo $username; ?>"/><br/>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email; ?>"/><br/>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" /><br/>
				<label for="confirm">Confirm</label>
				<input type="password" name="confirm" id="confirm" /><br/>
				<input type="submit" name="signUp" id="loginButton" value="SignUp" />
			</form>
		</div>
	</div>
</body>
</html>