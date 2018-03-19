<!DOCTYPE html>

<?php

	session_start();

	if($_SESSION['sess_user'] === null){
		header("Location: login.php");
	}

	

	if(time() > $_SESSION['expire']){
		header("Location: logout.php");
	}
	else{
		$_SESSION['expire'] = time()+60;
	}

?>


<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StudentCalendar</title>

    <!-- Bootstrap core CSS -->
    <link href="./StudentCalendar_files/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./StudentCalendar_files/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./StudentCalendar_files/custom.css" rel="stylesheet">

</head>

<script type = "text/javascript" src="./StudentCalendar_files/events.js"></script>

<script src="./StudentCalendar_files/jquery-3.2.1.min.js"></script>
<script src="./StudentCalendar_files/bootstrap.min.js"></script>
<script src="./StudentCalendar_files/moment.min.js"></script>
<script src="./StudentCalendar_files/bootstrap-datetimepicker.min.js"></script>
<script src="./StudentCalendar_files/jquery.form.min.js"></script>
<script src="./StudentCalendar_files/jquery.fs.dropper.js"></script>
<script src="./StudentCalendar_files/jquery.metadata.js"></script>
<script src="./StudentCalendar_files/jquery.tablesorter.js"></script>
<script src="./StudentCalendar_files/jquery.calendar-widget.js"></script>
<script src="./StudentCalendar_files/jquery-ui.min.js.download"></script>
<script src="./StudentCalendar_files/fullcalendar.js"></script>
<script src="./StudentCalendar_files/engine.js"></script>
<script src="./StudentCalendar_files/tinymce.min.js.download"></script>
<script src="./StudentCalendar_files/Chart.js.download"></script>

<body role="document">

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                                <li><a href="assignments.php">Assignments </a></li>
                                <li><a href="redirect.php">Calendar </a></li>
                                <li><a href="forumredirect.php">Forum </a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php $user = $_SESSION['sess_user'];
					print "$user";
					?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                                                
                        <li><a href="password.php">Change password</a></li>
                        <?php 
                        if($_SESSION['sess_acct']=="teacher"){
                        	print "<li><a href='classcode.php'>Change class code</a></li>";
                        }
						?>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Trigger the modal with a button -->
<?php
if($_SESSION["sess_acct"]=="teacher"){
print'
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Event</button>';
}
?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="myModalLabel" class="modal-title">Event</h4></div><div class="modal-body"><form method="post">
    <input type="hidden" name="id" value="">
    <div class="row">
	    <div class="form-group">
                                <label for="comment">Assignment name</label>
                                <input type="text" name="name" class="form-control" value="" placeholder="Title" id="name"/>
    </div>
        <div class="col-sm-3">
            <div class="form-group">
            <label for="date">Date</label>
            <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
			$('#datetimepicker1').datetimepicker({format: 'MM/DD/YYYY'});
            });
        </script>
    </div>
</div>
            </div>
        </div>
    </div>

</form>
</div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Close</button><button id="save" class="btn btn-primary">Save</button></div></div></div>

<script>
name = document.getElementById("name");
date = document.getElementById("date");

document.getElementById("save").onclick = function() {myFunction()};

function myFunction() {
	var event={title: name, start:  new Date()};
	$('#calendar').fullCalendar( 'renderEvent', event, true);
}
</script>

</div>

<div class="container theme-showcase" id="container" role="main">
    <div id="calendar" class="fc fc-ltr fc-unthemed"><div class="fc-toolbar"><div class="fc-left"><div class="fc-button-group"></div></div><div class="fc-right"><div class="fc-button-group"></div></div><div class="fc-center"></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-agendaWeek-view fc-agenda-view"></div></div></div>

	
    <script>
        var customSearch = {
            user:""
        };
        $('.change-select').change(function(){
            $('#calendar').fullCalendar( 'refetchEvents' );
        });
        var bindPageForm = function(fm){

            fm.find('.timepicker').datetimepicker({format: 'h:mm a', stepping: 15}).on('dp.show', function(event) {
                var inp = $(this).find('input');
                if(inp.val()=="12:00 am") {
                    switch (inp.prop("name")) {
                        case "time_start":
                            $(this).data("DateTimePicker").date("06:00 am");
                            break;
                        case "time_end":
                            $(this).data("DateTimePicker").date("10:00 pm");
                            break;
                    }
                }

            });

            fm.find('.calendar').datetimepicker({format: 'MM/DD/YYYY'});
            fm.find('select[name="lid"]').change(function(){
                if($(this).val()=='other'){
                    fm.find('input[name="location"]').prop('disabled',false);
                }
                else {
                    fm.find('input[name="location"]').prop('disabled',true);
                }
            });

        };



        var openEventWindow = function(event) {
            var eventProp = event.split(":");
            var uLoad,
                uSave,
                eName,
                eProp;
            if(eventProp[0]=="task"){
                uLoad = "/html/task.card.php";
                uSave = "/json/task.php";
                eName = "Task";
                eProp = {'tid':eventProp[1]};
            }
            else {
                uLoad = "/html/schedule.card.php";
                uSave = "/json/set-user-schedule.php";
                eName = "Event";
                eProp = {'id':eventProp[1]};
            }

            var btn = {
                "Save":function(dlg){
                    var fm = dlg.find('form');
                    var err = checkRequired(fm);
                    if(err) {
                        showError(err);
                    }
                    else {
                        $.ajax({
                            type: "post",
                            url: uSave,
                            dataType: 'json',
                            data: fm.serialize(),
                            success: function(jsn){
                                if(jsn.error){
                                    showError(jsn.error);
                                }
                                else {
                                    dlg.modal('hide');
                                    $('#calendar').fullCalendar('refetchEvents');
                                }
                            }
                        });
                    }

                }
            };
            var dlg = makeModal(eName,btn, 'sm');

        };




                $('#calendar').fullCalendar({
                    customButtons: {
                        addEvent: {
                            text: 'Add Event',
                            click: function() {
                                openEventWindow('add');
                            }
                        }
                    },
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaFourDay,agendaDay'
                    },
                    views: {
                        agendaFourDay: {
                            type: 'agenda',
                            duration: { days: 4 },
                            buttonText: '4 day'
                        }
                    },

                    defaultView: 'month',

                    defaultDate: moment().add(-2, 'days'),
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: events,

                    eventClick: function(calEvent, jsEvent, view) {
                        var event_id = calEvent.id;
                        openEventWindow(event_id);
                    }
                });
</script>
	
</div> <!-- /container -->

<link href="./StudentCalendar_files/jquery.fs.dropper.css" rel="stylesheet">
<link href="./StudentCalendar_files/jquery-ui.min.css" rel="stylesheet">
<link href="./StudentCalendar_files/calendar-widget.css" rel="stylesheet">
<link href="./StudentCalendar_files/fullcalendar.min.css" rel="stylesheet">
<link href="./StudentCalendar_files/fullcalendar.add.css" rel="stylesheet">

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body></html>