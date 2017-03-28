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
?>
    <link rel='stylesheet' href='css/jquery-ui.theme.min.css' />
    <link rel='stylesheet' href='css/fullcalendar.min.css' />
    <link rel='stylesheet' href='css/fullcalendar.print.min.css' media='print' />
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script>
        var utc = new Date().toJSON().slice(0,10);
        $(document).ready(function() {
        
            $('#calendar').fullCalendar({
                theme: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                defaultDate: utc,
                editable: false,
                navLinks: true, // can click day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: 'get-events.php',
                    error: function() {
                        $('#script-warning').show();
                    }
                },
                loading: function(bool) {
                    $('#loading').toggle(bool);
                }
            });
            
        });

    </script>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #script-warning {
            display: none;
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            color: red;
        }

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
        }

    </style>
    
    <div style="max-width: 900px; margin: 40px auto; padding: 0 10px; background: rgba(76, 175, 80, 0.7)">
        <div align="right" style="max-width: 900px;"><a href="book.php" class="btn btn-danger" role="button">Book</a></div>
        <div id='loading'>loading...</div>
        <div id='calendar' style=""></div>
    </div>
    <!-- /.container -->

<?php
    if (!isset($_GET['ios_login_user'])) {
        require "footer.php";
    }
?>
