<?php
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "DKN";

    $username  = $_POST["username"];
    $name      = $_POST["name"];
    $branch_id = $_POST["branch"];
    $tel       = $_POST["tel"];
    $email     = $_POST["email"];
    $address   = $_POST["address"];
    $city      = $_POST["city"];
    $province  = $_POST["province"];
    $postal    = $_POST["postal"];
    $make      = $_POST["make"];
    $model     = $_POST["model"];
    $year      = $_POST["year"];
    $book_date = $_POST["book_date"];
    $book_time = $_POST["book_time"];
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO Appointments (username, branch_id, date, time, visitor_name, tel, email, address, city, province, postal, make, model, year, is_scheduled)
        VALUES (:username, :branch_id, :book_date, :book_time, :name, :tel, :email, :address, :city, :province, :postal, :make, :model, :year, 'N')");
        $stmt->bindParam(':username',  $username);
        $stmt->bindParam(':branch_id', $branch_id);
        $stmt->bindParam(':book_date', $book_date);
        $stmt->bindParam(':book_time', $book_time);
        $stmt->bindParam(':name',      $name);
        $stmt->bindParam(':tel',       $tel);
        $stmt->bindParam(':email',     $email);
        $stmt->bindParam(':address',   $address);
        $stmt->bindParam(':city',      $city);
        $stmt->bindParam(':province',  $province);
        $stmt->bindParam(':postal',    $postal);
        $stmt->bindParam(':make',      $make);
        $stmt->bindParam(':model',     $model);
        $stmt->bindParam(':year',      $year);
        
        $stmt->execute();
        
        $conn = null;     

    } catch(PDOException $e) {
        echo $e->getMessage();
        echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
        //header("Location:503.html");
    }

   // header("Location:service.php");

?>