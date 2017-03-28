<?php
    
    if (!isset($_GET['ios_login_user'])) {
        require "header.php";
        if (!isset($_SESSION["login_user"])) {
            header("location: login.php");
        }

        $username = $_SESSION["login_user"];

    } else {
?>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-casual.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <script src="js/jquery.validation.js"></script>
        <script src="js/validation.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
<?php
        $username = $_GET['ios_login_user'];
        $_SESSION['login_user'] = $username;
    }    

    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "DKN";
     
    $customer = null;
    $cars     = array();
    $branches = array();
    $times    = array();

    if (isset($_GET['id'])) {
        echo "==================================================================================";
    }

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT name
                                     , tel
                                     , email
                                     , address
                                     , city
                                     , province
                                     , postal
                                  FROM Users
                                 WHERE username = :username"
                               );
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $customer = $stmt->fetch(PDO::FETCH_OBJ);
        
        $stmt = null;

        $stmt = $conn->prepare("SELECT car_id
                                     , make
                                     , model
                                     , year
                                  FROM Cars
                                 WHERE username = :username"
                               );
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($cars, $result);            
        }
        
        $stmt = null;

        $stmt = $conn->prepare("SELECT branch_id
                                     , name
                                  FROM Branches
                                 WHERE is_open = 'Y'"
                               );
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($branches, $result);            
        }
        
        $stmt = null;

        $stmt = $conn->prepare("SELECT time
                                  FROM Appointments A
                                 INNER JOIN Branches B 
                                    ON A.branch_id = B.branch_id
                                 WHERE A.is_scheduled = 'Y'
                                   AND B.is_main = 'Y'
                                 ORDER BY time ASC"
                               );
        $stmt->execute();

        while($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($times, $result);            
        }
        
        $conn = null;

    } catch(PDOException $e) {
        echo "<script type='text/javascript'>alert('Error: " . $e->getMessage() . "');</script>";
        //header("Location:503.html");
    }

?>
    <script type="text/javascript">
        
        var carArray = {};
        $(document).ready(function() {
            <?php
            if (sizeof($cars) > 1) {
            ?>
            $("#car_dropdown").html("<div class='dropdown'>" +
                                    "    <button class='btn btn-success dropdown-toggle' type='button' data-toggle='dropdown'>Choice your car" +
                                    "    <span class='caret'></span></button>" +
                                    "    <ul class='dropdown-menu'>" +
                                        <?php
                                            $index = 0;
                                            foreach($cars as $car) {
                                                echo "\"<li><a href='javascript:setCar($index)'>$car->make $car->model $car->year</a></li>\" + \n";
                                                $index++;
                                            }
                                        ?>
                                    "    </ul>\n" +
                                    "</div>\n");
            <?php
            } else if (sizeof($cars) == 1) {

                echo "$('#make').val('" . $cars[0]->make . "');\n";
                echo "$('#model').val('" . $cars[0]->model . "');\n";
                echo "$('#year').val('" . $cars[0]->year . "');\n";
                
            }
            ?>
            $("#branch_dropdown").html("<div class='form-group col-lg-4'>\n" +
                                    "    <label for='branch'>Branch</label>\n" +
                                    "    <select class='form-control' name='branch' id='branch'>\n" +
                                        <?php
                                            $index = 0;
                                            foreach($branches as $branch) {
                                                echo "\"<option value='$branch->branch_id'> $branch->name</option>\" + \n";
                                                $index++;
                                            }
                                        ?>
                                    "    </select>\n" +
                                    "</div>\n");
            
    <?php
        $index = 0;
        foreach($times as $time) {
            echo "$('#book_time').find('[value=$time->time]').remove();\n";            
            $index++;
        }
        echo "$('#book_time').selectpicker('refresh');\n";
    ?>
            $("#province").val("<?php echo $customer->province ?>");
            
            $("#book_date").datepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
            });

    
        });

    <?php
        $index = 0;
        foreach($cars as $car) {
            echo "carArray[$index] = {'make': '$car->make', 'model': '$car->model', 'year': '$car->year'};\n";
            $index++;
        }
    ?>
        function setCar(i) {
            $("#make").val(carArray[i]["make"]);
            $("#model").val(carArray[i]["model"]);
            $("#year").val(carArray[i]["year"]);
        }

    </script>

    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-datepicker3.css"/>

    <div class="container">
        <form name="form" action="book_proc.php" method="POST">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Personal Information <strong>form</strong></h2>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Userame</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Visitor Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $customer->name ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Contact Number</label>
                            <input type="tel" name="tel" class="form-control" value="<?php echo $customer->tel ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $customer->email ?>">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $customer->address ?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="<?php echo $customer->city ?>">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="province">Province</label>
                            <select class="form-control" name="province" id="province">
                                <option value="Ontario">Ontario</option>
                                <option value="Quebec">Quebec</option>
                                <option value="British Columbia">British Columbia</option>
                                <option value="Nova Scotia">Nova Scotia</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label>Postal Code</label>
                            <input type="text" name="postal" class="form-control" value="<?php echo $customer->postal ?>">
                        </div>                       
                    </div>

                    <hr>
                    <h2 class="intro-text text-center">Car Information <strong>form</strong></h2>
                    <hr>
                        <div id="car_dropdown"></div><br/>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Make</label>
                                <input type="text" name="make" id="make" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Model</label>
                                <input type="text" name="model" id="model" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Year</label>
                                <input type="text" name="year" id="year" class="form-control">
                            </div>
                        </div>

                    <hr>
                    <h2 class="intro-text text-center">The time you want to be serviced</h2>
                    <hr>
                    <div class="row">
                        <div id="branch_dropdown"></div>                            
                        <div class="form-group col-lg-4">
                            <label>Date</label>
                            <input type="text" name="book_date" id="book_date" class="form-control" placeholder="YYYY-MM-DD"  >
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="province">Time</label>
                            <select class="form-control" name="book_time" id="book_time">
                                <option value="01"> 09:00 ~ 11:00</option>
                                <option value="02"> 11:00 ~ 13:00</option>
                                <option value="03"> 13:00 ~ 15:00</option>
                                <option value="04"> 15:00 ~ 17:00</option>
                                <option value="05"> 17:00 ~ 19:00</option>
                                <option value="06"> 19:00 ~ 21:00</option>
                            </select>
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- /.container -->
<?php
    if (!isset($_GET['ios_login_user'])) {
        require "footer.php";
    }
?>
