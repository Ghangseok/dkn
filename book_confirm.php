<?php
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "DKN";

    $id   = $_GET["id"];
    $is_s = $_GET["is_s"];
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE Appointments 
                                   SET is_scheduled = :is_scheduled
                                 WHERE appointment_id = :id");
        $stmt->bindParam(':is_scheduled', $is_s);
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
        
        $stmt = null;
        $conn = null;     

    } catch(PDOException $e) {
        echo $e->getMessage();
        //header("Location:503.html");
    }

   header("Location:manage_book.php");

?>