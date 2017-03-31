<?php
    require "mysql_connection.php";

   $error ="";
   $users  = array();
    
   $SignUp = "";
   $Username = "";
  $password = "";
  $confirm password = "";
  $name = "";
  $contact number = "";
  $Email Address = "";
  $Address = "";
  $city = "";
  $Province = "";
  $Postal code = "";
  $Make = "";
  $Model = "";
  $year = "";
  



    
        
			if(isset($_GET['signup'])){
				
				$user_n = $_GET['username'];
				$pass = $_GET['password'];
				$name = $_GET['name'];
				$tel = $_GET['tel'];
				$email = $_GET['email'];
				$address = $_GET['address'];
				$city = $_GET['city'];
				$province = $_GET['province'];
				$postal = $_GET['postal'];
				$make = $_GET['make'];
				$model = $_GET['model'];
				$year = $_GET['year'];

                                }else if(isset($_POST['signup'])){
				
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
Username = "";
  $password = "";
  $confirm password = "";
  $name = "";
  $contact number = "";
  $Email Address = "";
  $Address = "";
  $city = "";
  $Province = "";
  $Postal code = "";
  $Make = "";
  $Model = "";
  $year = "";
  
$query = mysqli_query($con , "INSERT INTO 'users'(username, password, confirm password, name, contact number, email address, address, city, province, postal code, is_block, is_admin) values ('$username', '$password,','$confirm password','$name', '$contact number','$email address', '$address', '$city', '$province', '$postal code', '1', 'client');

 $query = mysqli_query($con , "INSERT INTO 'cars'(username, make, model, year, ) values ('$username', '$make,','$model','$year)


			$total = $query->fetch_array(MYSQLI_ASSOC);
			$rows = mysqli_num_rows($query);
			array_push($users, $total);
			
				
				
		if ($rows == 1 && $total['username'] === $_GET['username'] && $total['password']===$_GET['password'] && $total[' confirm password']===$_GET['confirm password'] && $total['name']===$_GET['name'] && $total['contact number']===$_GET['contact number'] && $total['email address']===$_GET['email address'] && $total['address']===$_GET['address'] && $total['city']===$_GET['city'] && $total['province']===$_GET['province'] && $total['postal code']===$_GET['postal code'])

 {
	
	echo json_encode($users);
	//echo "[{\"login\":\"" . $login . "\",\"username\":\"" . $username . "\",\"name\":\"" . $password . "\",\"is_block\":\"1\"}]";
?>