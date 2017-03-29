<?php

	require "mysql_connection.php";
    
    $error = "";
	$users     = array();

	$login = "";
	$username = "";
	$password = "";
	
	if (isset($_GET["username"])) {
		$login = $_GET["login"];
		$username = $_GET["username"];
		$password = $_GET["password"];
	} else if (isset($_POST["username"])) {
		$login = $_POST["login"];
		$username = $_POST["username"];
		$password = $_POST["password"];
	}
	
/*
	trigger_error("login : " . $login);
	trigger_error("username : " . $username);
	trigger_error("password : " . $password);

	$login = "login";
	$username = "username";
	$password = "password";
*/

	
	if (isset($_GET['login'])) {
		if (empty($_GET['username']) && empty($_GET['password'])) {
			$error = "Enter Username and Password";
		}else if (!empty($_GET['username']) && empty($_GET['password'])) {
			$error = "Enter a Password";
		}else if (empty($_GET['username']) && !empty($_GET['password'])) {
			$error = "Enter a Username";
		}
		else
		{
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($con , "SELECT username, password, name, is_block FROM users WHERE username='$username' and password='$password'");
			$total = $query->fetch_array(MYSQLI_ASSOC);
			$rows = mysqli_num_rows($query);
			array_push($users, $total);
			
			if ($rows == 1 && $total['username'] === $_GET['username'] && $total['password']===$_GET['password']) {
				$_SESSION['login_user'] = $username; // Initializing Session
				//header("location: index.php"); // Redirecting To Other Page
			} else if($rows == 1 && $total['username'] != $_GET['username'] && $total['password']===$_GET['password']){
				$error = "Username is invalid";
			}
			else if($rows == 1 && $total['username'] === $_GET['username'] && $total['password']!=$_GET['password']){
				$error = "Password is invalid";
			} if($rows == 1 && $total['username'] === $_GET['username'] && $total['password']===$_GET['password'] && $total['is_block']=='0'){
				$error = "Sorry, You are blocked by admin!";
			}
			//mysql_close($con); // Closing Connection
		}
	}
	

	echo json_encode($users);
	//echo "[{\"login\":\"" . $login . "\",\"username\":\"" . $username . "\",\"name\":\"" . $password . "\",\"is_block\":\"1\"}]";
?>