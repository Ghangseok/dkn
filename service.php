<?php
    require "header.php";
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
    require "footer.php";
?>
