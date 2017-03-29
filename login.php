<?php
    require "header.php";
?>

    <div class="container"> 
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
				$query = mysqli_query($con , "SELECT * FROM users WHERE username='$username'");
				$total = $query->fetch_array(MYSQLI_ASSOC);
				$rows = mysqli_num_rows($query);
				
				if ($rows == 1 && $total['username'] === $_POST['username'] && $total['password']===$_POST['password']) {
					$_SESSION['login_user'] = $username; // Initializing Session
					$_SESSION['login_name'] = $total['name'];
					header("location: index.php"); // Redirecting To Other Page
				} else if($rows == 1 && $total['username'] != $_POST['username'] && $total['password']===$_POST['password']){
					$error = "Username is invalid";
				}
				else if($rows == 1 && $total['username'] === $_POST['username'] && $total['password']!=$_POST['password']){
					$error = "Password is invalid";
				} else {
					$error = "Sorry, You are blocked by admin!";
				}
				//mysql_close($con); // Closing Connection
			}
		}
	?>	
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
				<?php echo ($error!=""?$error:'');?>
                    <hr>
                    <h2 class="intro-text text-center">Account <strong>form</strong></h2>
                    <hr>
                    <form action="login_proc.php" role="form" method="post">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Userame</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <input type="submit" name="login" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

<?php
    require "footer.php";
?>