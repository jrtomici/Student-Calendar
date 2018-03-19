
  					
<!DOCTYPE html>

<?php
/*
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
*/
?>


<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assignments</title>

    <!-- Bootstrap core CSS -->
    <link href="./StudentCalendar_files/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./StudentCalendar_files/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./StudentCalendar_files/custom.css" rel="stylesheet">

</head>

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
<script src="./StudentCalendar_files/modal.js"></script>
<script src="./StudentCalendar_files/engine.js"></script>
<script src="./StudentCalendar_files/tinymce.min.js.download"></script>
<script src="./StudentCalendar_files/Chart.js.download"></script>


<div class="container theme-showcase" id="container" role="main">        <h2>Assignments</h2>
        <table class="table table-hover table-striped" id="studentsTable">
            <thead>
            <tr>
                <th>Assignment</th>
                                <th>Upload</th>
                                <th>Student</th>
                                <th>Grade</th>
                
            </tr>
            </thead>


                            <tbody>
<?php
	$file = file("assign.txt");
	$stud = fopen("data.txt", 'r');
	while(!feof($stud)){
		$line = fgets($stud);
		list($user, $pass, $acct) = explode(';', $line);
		print '<div class="form-group">
    					<label for="account" class="col-sm-2 control-label">Account type</label>
    					<select name="acct" class="form-control">
    						  <option value="teacher"> Teacher </option>
   							  <option value="student"> Student </option>
    					</select>
  					</div>'
	}
?>							
                            <tr>
                    <td><a href="https://office.codeadvantage.org/get/doc.php?id=40"><br><strong><?=$nameDesc[0]?></strong></a></td>
                                        <td><label class="btn btn-primary">Browse&hellip; <input type="file" style="display: none;"></label></td>
                                        <td>
                    
                                        </td>
                                        <td><?=$nameDesc[2]?></td>
                                    </tr>

	<?php
	$num = rand(0, 3);
	$lines = file("assignments.txt");
	$line = $lines[$num];
	$nameDesc = explode("\t", $line);
	?>
                            <tr>
                    <td><a href="https://office.codeadvantage.org/get/doc.php?id=40"><br><strong><?=$nameDesc[0]?></strong></a></td>
                                        <td><label class="btn btn-primary">Browse&hellip; <input type="file" style="display: none;"></label></td>
                                        <td><?=$nameDesc[1]?></td>
                                        <td><?=$nameDesc[2]?></td>
                                    </tr>
										<?php
	$num = rand(0, 3);
	$lines = file("assignments.txt");
	$line = $lines[$num];
	$nameDesc = explode("\t", $line);
	?>
                            <tr>
                    <td><a href="https://office.codeadvantage.org/get/doc.php?id=40"><br><strong><?=$nameDesc[0]?></strong></a></td>
                                        <td><label class="btn btn-primary">Browse&hellip; <input type="file" style="display: none;"></label></td>
                                        <td><?=$nameDesc[1]?></td>
                                        <td><?=$nameDesc[2]?></td>
                                    </tr>
										<?php
	$num = rand(0, 3);
	$lines = file("assignments.txt");
	$line = $lines[$num];
	$nameDesc = explode("\t", $line);
	?>
                            <tr>
                    <td><a href="https://office.codeadvantage.org/get/doc.php?id=40"><br><strong><?=$nameDesc[0]?></strong></a></td>
                                        <td><label class="btn btn-primary">Browse&hellip; <input type="file" style="display: none;"></label></td>
                                        <td><?=$nameDesc[1]?></td>
                                        <td><?=$nameDesc[2]?></td>
                                    </tr>
										<?php
	$num = rand(0, 3);
	$lines = file("assignments.txt");
	$line = $lines[$num];
	$nameDesc = explode("\t", $line);
	?>
                            <tr>
                    <td><a href="https://office.codeadvantage.org/get/doc.php?id=40"><br><strong><?=$nameDesc[0]?></strong></a></td>
                                        <td><label class="btn btn-primary">Browse&hellip; <input type="file" style="display: none;"></label></td>
                                        <td><?=$nameDesc[1]?></td>
                                        <td><?=$nameDesc[2]?></td>
                                    </tr>
                    </tbody></table>
        <script>

            $('#set_next_quiz').click(function(){
                var id = $(this).data("id");
                var btn = {
                    "Set":function(dlg){
                        var fm = dlg.find('form');
                        $.ajax({
                            type: "post",
                            url: '/json/set-quiz.php',
                            dataType: 'json',
                            data: fm.serialize(),
                            success: function(jsn){
                                dlg.modal('hide');
                                loadContent('section-instructor',jsn.section);
                            }
                        });

                    }

                };
                var dlg = makeModal('Add Next Lesson Materials',btn,'lg');
                $.ajax({
                    type: "get",
                    url: '/html/section-quiz.php',
                    dataType: 'html',
                    data: {"uin":id},
                    success: function(dat){
                        dlg.body.html(dat);
                    }
                });
            });
            $('.show-quiz').click(function(){
                var id = $(this).data("id");
                var btn = {};
                var dlg = makeModal('Lesson',btn,'lg');
                $.ajax({
                    type: "get",
                    url: '/html/section-quiz-show.php',
                    dataType: 'html',
                    data: {"uin":id},
                    success: function(dat){
                        dlg.body.html(dat);
                    }
                });
            });
            $('.get-quiz-result').click(function(){
                var id=$(this).data("id");
                var tr =$(this).parents('tr').next().show();
                var td = tr.show().find('td').html('<div class="loading">loading</div>');
                $.ajax({
                    type: "get",
                    url: '/html/quiz-get-result.php',
                    dataType: 'html',
                    data: {'id':id},
                    success: function(dat){
                        td.html(dat);
                        $('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').prependTo(td).css({
                            "cursor":"pointer",
                            "float":"right"
                        }).click(function(){
                            $(this).parents('tr').hide();
                        });

                    }
                });

            });
            $('.make-quiz').click(function(){
                var day = $(this).data("id");
                var quiz = $(this).data("quiz");
                var btn = $(this);
                $.ajax({
                    type: "post",
                    url: '/json/set-quiz.php',
                    dataType: 'json',
                    data: {'day':day,"quiz":quiz},
                    success: function(jsn){
                       // btn.removeClass("btn-primary make-quiz").addClass("btn-success").prop("disabled","true").removeEvent('click');
                       // window.location.reload();
                        loadContent('section-instructor',jsn.section);

                    }
                });
            });


            $('.student-comment').click(function(){
                var student = $(this).data("sid");
                var section = $(this).data("prsid");
                var tr =$(this).parents('tr').next().show();
                var td = tr.show().find('td').html('<div class="loading">loading</div>');
                $.ajax({
                    type: "get",
                    url: '/html/parent.message.php',
                    dataType: 'html',
                    data: {'student':student,'section':section},
                    success: function(dat){
                        td.html(dat);
                        $('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>').prependTo(td).css({
                            "cursor":"pointer",
                            "float":"right"
                        }).click(function(){
                            $(this).parents('tr').hide();
                        });
                        td.find("form").submit(function(){ return false;});

                    }
                });
            });

            $("#studentsTable").on("click", ".parent-message",function(){
                var fm = $(this).parents("form");
                var tr =$(this).parents('tr');
                $.ajax({
                    type: "post",
                    url: '/html/parent.message.php',
                    dataType: 'html',
                    data: fm.serialize(),
                    success: function(dat){
                        tr.hide();
                    }
                });
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
<script src="./StudentCalendar_files/jquery.min.js.download"></script>
<script src="./StudentCalendar_files/bootstrap.min.js.download"></script>
<script src="./StudentCalendar_files/moment.min.js.download"></script>
<script src="./StudentCalendar_files/bootstrap-datetimepicker.min.js.download"></script>
<script src="./StudentCalendar_files/jquery.form.min.js.download"></script>
<script src="./StudentCalendar_files/jquery.fs.dropper.js.download"></script>
<script src="./StudentCalendar_files/jquery.metadata.js.download"></script>
<script src="./StudentCalendar_files/jquery.tablesorter.js.download"></script>
<script src="./StudentCalendar_files/jquery.calendar-widget.js.download"></script>
<script src="./StudentCalendar_files/jquery-ui.min.js.download"></script>
<script src="./StudentCalendar_files/fullcalendar.min.js.download"></script>
<script src="./StudentCalendar_files/modal.js.download"></script>
<script src="./StudentCalendar_files/engine.js.download"></script>
<script src="./StudentCalendar_files/tinymce.min.js.download"></script>
<script src="./StudentCalendar_files/Chart.js.download"></script>


</body></html>