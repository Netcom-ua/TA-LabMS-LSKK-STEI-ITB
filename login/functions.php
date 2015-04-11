<?php
function sec_session_start() {
	$session_name = 'sec_session_id'; // Set a custom session name
	$secure = false; // Set to true if using https.
	$httponly = true; // This stops javascript being able to access the session id.
	ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies.
	$cookieParams = session_get_cookie_params(); // Gets current cookies params.
	session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
	session_name($session_name); // Sets the session name to the one set above.
	session_start(); // Start the php session
	session_regenerate_id(false); // regenerated the session, delete the old one.
	$inactive = 600;
	// check to see if $_SESSION['timeout'] is set
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['timeout'];
		if($session_life > $inactive)
		{ 
		echo "<script language=javascript>
		alert('Sesi Telah Habis');</script>";
		echo '<script type=text/javascript>
		window.location = "logout.php";
		</script>';
		}
	}
	$_SESSION['timeout'] = time();
}


function login($email, $password, $mysqli) {

	// Using prepared Statements means that SQL injection is not possible.
	if ($stmt = $mysqli->prepare("SELECT id, username,role, password, salt FROM mdl_user WHERE nim = ? LIMIT 1")) {
		$stmt->bind_param('s', $email); // Bind "$email" to parameter.
		$stmt->execute(); // Execute the prepared query.
		$stmt->store_result();
		$stmt->bind_result($user_id, $username, $role, $db_password, $salt); // get variables from result.
		// hash the password with the unique salt.
		$stmt->fetch();
		
		
		$leng = strlen($db_password);
		$salt = hash('sha512', $salt);
		if($leng < 100)
		{
		$db_password = hash('sha512', $db_password);
		
		$db_password = $db_password + $salt;
		
		}
		else
		{
		$db_password = $db_password + $salt;	
		}
		
		if ($salt != "")
		{
		$password = $password + $salt;
		}
		else {
			$password = $password;
		}
		
		// hash the password with the unique salt.
		
		//echo $password; echo "    "; echo $db_password; echo "    ";echo $salt;
		if($stmt->num_rows == 1) { // If the user exists
			if(checkbrute($user_id, $mysqli) == true) {
				?>
				<script type=text/javascript>
				alert("Akun anda Di lock untuk sementara waktu mohon dicoba 2 jam kedepan");
				window.location('../index.php');
				</script>
				<?
				
				return false;
			} else {
				if($db_password == $password) { // Check if the password in the database matches the password the user submitted.
					// Password is correct!

					// We check if the account is locked from too many login attempts

					$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user.
					$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.

					// $user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
					$_SESSION['user_id'] = $user_id;
					$_SESSION['role'] = $role;
					$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
					$_SESSION['username'] = $username;
					$_SESSION['login_string'] = hash('sha512', $password.$ip_address.$user_browser);
					// Login successful.
					return true;
				} else {
					// Password is not correct
					// We record this attempt in the database
					$now = time();
					$mysqli->query("INSERT INTO login_attempts (userid, time) VALUES ('$user_id', '$now')");
					return false;
				}
			}
		} else {
			// No user exists.
			return false;
		}
	}
}
function checkbrute($user_id, $mysqli) {
	// Get timestamp of current time
	$now = time();
	// All login attempts are counted from the past 2 hours.
	$valid_attempts = $now - (2 * 60 * 60);
	if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE userid = '$user_id' AND time > '$valid_attempts'")) {
		$stmt->bind_param('i', $user_id);
		// Execute the prepared query.
		$stmt->execute();
		$stmt->store_result();
		// If there has been more than 5 failed logins
		if($stmt->num_rows > 5) {
			return true;
		} else {
			return false;
		}
	}
}


function login_check($mysqli) {
	// Check if all session variables are set
	if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'],$_SESSION['role'])) {
		$user_id = $_SESSION['user_id'];
		$login_string = $_SESSION['login_string'];
		$username = $_SESSION['username'];
		$role = $_SESSION['role'];
		$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user.
		$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.

		if ($stmt = $mysqli->prepare("SELECT password FROM mdl_user WHERE id = ? LIMIT 1")) {
			$stmt->bind_param('i', $user_id); // Bind "$user_id" to parameter.
			$stmt->execute(); // Execute the prepared query.
			$stmt->store_result();

			if($stmt->num_rows == 1) { // If the user exists
				$stmt->bind_result($password); // get variables from result.
				$stmt->fetch();
				$login_check = hash('sha512', $password.$ip_address.$user_browser);
				if($login_check == $login_string) {
					// Logged In!!!!
					return true;
				} else {
					// Not logged in
					return false;
				}
			} else {
				// Not logged in
				return false;
			}
		} else {
			// Not logged in
			return false;
		}
	} else {
		// Not logged in
		return false;
	}
}

