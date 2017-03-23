<?php
    $branch_name = $_POST["branch_name"];
    $telephone = $_POST["tel"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $postal = $_POST["postal"];
    $map = $_POST["map"];
    $email = $_POST["email"];
    //INSERT INTO `dkn`.`branches` (`name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `is_main`, `is_open`) 
    // VALUES (:name, :tel, :email, :address, :city, :province, :postal, 'Y', 'Y');

    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "DKN";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO `dkn`.`branches` (`name`, `tel`, `email`, `address`, `city`, `province`, `postal`, `map`, `is_main`, `is_open`) 
        VALUES (:name, :tel, :email, :address, :city, :province, :postal, :map, 'Y', 'Y')");
        $stmt->bindParam(':name',      $branch_name);
        $stmt->bindParam(':tel',       $telephone);
        $stmt->bindParam(':email',     $email);
        $stmt->bindParam(':address',   $address);
        $stmt->bindParam(':city',      $city);
        $stmt->bindParam(':province',  $province);
        $stmt->bindParam(':postal',    $postal);
        $stmt->bindParam(':map',       $map);
        
        $stmt->execute();
        
        $conn = null;     

    } catch(PDOException $e) {
        echo $e->getMessage();
        //echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
        //header("Location:503.html");
    }

    // header("Location:contact.php");

?>