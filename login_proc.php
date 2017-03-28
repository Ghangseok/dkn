<?php
    
    $error = "";
		if (isset($_POST['login'])) {
			if (empty($_POST['username']) && empty($_POST['password'])) {
				$error = "Enter Username and Password";
			}else if (!empty($_POST['username']) && empty($_POST['password'])) {
				$error = "Enter a Password";
			}else if (empty($_POST['username']) && !empty($_POST['password'])) {
				$error = "Enter a Username";
			}
			else
			{
				// Define $username and $password
				$username=$_POST['username'];
				$password=$_POST['password'];
				// SQL query to fetch information of registerd users and finds user match.
				$query = mysqli_query($con , "SELECT username, password, name, is_block FROM users WHERE username='$username'");
				$total = $query->fetch_array(MYSQLI_ASSOC);
				$rows = mysqli_num_rows($query);
				
				if ($rows == 1 && $total['username'] === $_POST['username'] && $total['password']===$_POST['password']) {
					$_SESSION['login_user'] = $username; // Initializing Session
					header("location: index.php"); // Redirecting To Other Page
				} else if($rows == 1 && $total['username'] != $_POST['username'] && $total['password']===$_POST['password']){
					$error = "Username is invalid";
				}
				else if($rows == 1 && $total['username'] === $_POST['username'] && $total['password']!=$_POST['password']){
					$error = "Password is invalid";
				} if($rows == 1 && $total['username'] === $_POST['username'] && $total['password']===$_POST['password'] && $total['is_block']=='0'){
					$error = "Sorry, You are blocked by admin!";
				}
				//mysql_close($con); // Closing Connection
			}
		}
?>