<?php
    require "header.php";


    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "DKN";

    //$username = $_SESSION["username"];
    //$name     = $_SESSION["name"];
    
    $username = "redeteus";
    $name     = "Ghang seok Seo";

    $is_scheduled = "Y";

    $schedules = array();

    if (isset($_GET['id'])) {
        echo "==================================================================================";
    }

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT A.appointment_id
                                      , A.branch_id
                                      , B.name as branch_name
                                      , A.date
                                      , CASE A.time WHEN '01' THEN '09:00'
                                                    WHEN '02' THEN '11:00'
                                                    WHEN '03' THEN '13:00'
                                                    WHEN '04' THEN '15:00'
                                                    WHEN '05' THEN '17:00'
                                                    WHEN '06' THEN '19:00'
                                        END as time
                                      , A.username
                                      , B.name as customer_name
                                      , A.visitor_name
                                      , A.tel
                                      , A.email
                                      , A.address
                                      , A.city
                                      , A.province
                                      , A.postal
                                      , A.make
                                      , A.model
                                      , A.year
                                      , A.is_scheduled
                                    FROM Appointments A
                                  INNER JOIN Users U
                                      ON A.username = U.username
                                  INNER JOIN Branches B
                                      ON A.branch_id = B.branch_id
                                  ORDER BY A.date, A.time"
                               );
        $stmt->bindParam(':is_scheduled', $is_scheduled);
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($schedules, $result);            
        }
        
        $stmt = null;
        $conn = null;

    } catch(PDOException $e) {
        echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
        //header("Location:503.html");
    }

?>
    <div class="container" style="background: white">
        <h2>Service Schedule</h2>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Branch</th>
                <th>Date</th>
                <th>Time</th>
                <th>Username</th>
                <th>Name</th>
                <th>Visitor</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Province</th>
                <th>Postal</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Confirm</th>                
              </tr>
            </thead>
            <tbody>
            <?php
              foreach ($schedules as $event) {
            ?>
              <tr>
                <td><?php echo $event->appointment_id ?></td>
                <td><?php echo $event->branch_name ?></td>
                <td><?php echo $event->date ?></td>
                <td><?php echo $event->time ?></td>
                <td><?php echo $event->username ?></td>
                <td><?php echo $event->customer_name ?></td>
                <td><?php echo $event->visitor_name ?></td>
                <td><?php echo $event->tel ?></td>
                <td><?php echo $event->email ?></td>
                <td><?php echo $event->address ?></td>
                <td><?php echo $event->city ?></td>
                <td><?php echo $event->province ?></td>
                <td><?php echo $event->postal ?></td>
                <td><?php echo $event->make ?></td>
                <td><?php echo $event->model ?></td>
                <td><?php echo $event->year ?></td>
                <td><div class="btn-group-vertical">
                    <a href="book_confirm.php?id=<?php echo $event->appointment_id ?>&is_s=Y" class="btn btn-success" role="button">Accept</a>
                    <a href="book_confirm.php?id=<?php echo $event->appointment_id ?>&is_s=N" class="btn btn-danger"  role="button">Decline</a>                    
                  </div></td>                
              </tr>      
            <?php
              }
            ?>
              
              
            </tbody>
          </table>               

    </div>

    <!-- /.container -->

<?php
    require "footer.php";
?>
