<?php
    require "header.php";
?>

    <div class="container">
        <?php 
			$con = mysqli_connect('localhost','root','','dkn');
			if(! $con )
		   {
			 die('Could not connect: ' . mysql_error());
		   }

			if(isset($_POST['signup'])){
				
				$user_n = $_POST['username'];
				$pass = $_POST['password'];
				$name = $_POST['name'];
				$tel = $_POST['tel'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$province = $_POST['province'];
				$postal = $_POST['postal'];
				$make = $_POST['make'];
				$model = $_POST['model'];
				$year = $_POST['year'];
				$check="SELECT * FROM users WHERE username='$user_n'";
				$rs = mysqli_query($con,$check);
				if(mysqli_num_rows($rs) > 0) {
					echo "User Name Already in Exists<br/>";
				}
				else
				{
					$sql="INSERT INTO `users` (`username`, `password`, `name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_block`, `is_admin`) VALUES ('$user_n', '$pass', '$name', '$tel', '$email', '$address', '$city', '$province', '$postal', 'N', 'N')";
					$sql1 = "INSERT INTO `cars` (`username`, `make`, `model`, `year`) VALUES ('$user_n', '$make', '$model', '$year');";
					
					if ($con->query($sql) === TRUE && $con->query($sql1) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $con->error;
						echo "Error: " . $sql1 . "<br>" . $con->error;
					}
				}
				$con->close();
			}
		?>
        <form role="form" method="post" id="signup">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Sign up <strong>form</strong></h2>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                            <div class="form-group col-lg-4">
                            <label>Confirm password</label>
                            <input type="password" name="con_password" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Contact Number</label>
                            <input type="tel" name="tel" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group col-lg-2">
                            <label>City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="province">Province</label>
                            <select class="form-control" id="province" name="province">
                                <option>Ontario</option>
                                <option>Quebec</option>
                                <option>British Columbia</option>
                                <option>Nova Scotia</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Postal Code</label>
                            <input type="text" name="postal" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Car Information <strong>form</strong></h2>
                    <hr>
                    <div class="clearfix" align="right">
                        <div class="form-group col-lg-12">
                            <input type="hidden" name="save" value="contact">
                            <button type="button" class="btn btn-danger">Add</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Make</label>
                            <input type="text" name="make" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control">
                        </div>
                    </div>

                    <hr>
                
                    <!--<div class="row">
                        <div class="form-group col-lg-4">
                            <label>Make</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Model</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Year</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>-->

                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <div class="clearfix">
                        <div class="form-group col-lg-12">                            
                            <!--<button type="button" class="btn-lg btn-success">Sign Up</button>-->
							<input type="submit" name="signup" value="Sign Up">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>

    </div>
    <!-- /.container -->
<?php
    require "footer.php";
?>
