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

    <title>Assignments</title>

    <!-- Bootstrap core CSS -->
    <link href="./StudentCalendar_files/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="./StudentCalendar_files/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./StudentCalendar_files/custom.css" rel="stylesheet">

</head>

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

<div class="container theme-showcase" id="container" role="main">        <h2>Assignments</h2>
<?php 
if($_SESSION['sess_acct']=="teacher"){
   print '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignmentModal">Add assignment</button>';
}
if($_SESSION['sess_acct']=="teacher"){
				
print '<button type="button" name="assign" class="btn btn-primary" data-toggle="modal" data-target="#gradeModal">
  Set grades
</button>';
;
}

if($_SESSION['sess_acct']=="teacher"){
   print '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete assignment</button>';
}
?>

<!-- Assignments Modal -->
<div class="modal fade" id="assignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
        		<form action = "" method="post">
            		<div class="form-group">
            			<label for="name" class="sr-only">Assignment name</label>
    					<input type="text" id="name" name="name" class="form-control" placeholder="Assignment name" required autofocus value="">
            			<label for="date" class="sr-only"> Due date</label>
						<div class='col-sm-6'>
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' name="date" class="form-control" id="date" placeholder="Due date"/>
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

    					
    					</select>
  					</div>
  					
        
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="savebtn" name="submit">Save</button>
        </form>
        <?php
		error_reporting(0);
		if(isset($_POST["submit"])){
			$f=fopen("assign.txt","a+");
			fwrite($f,$_POST["name"].";".$_POST["date"]."\r\n");
			fclose($f);
		}
		header("Location: redirect.php");
		?>
        
      </div>
    </div>
  </div>
</div>




<!--TABLE DISPLAY -->


<table class="table table-hover table-striped" id="studentsTable">
    <thead>
        <tr>
        	<th>Assignment</th>
            <th>Due date</th>
            <?php
            if($_SESSION["sess_acct"]=="student"){
            	print'<th>Grade</th>';
            }
            ?>
        </tr>
    </thead>


	<?php
	
	$ass=fopen("assign.txt", 'r');
	$count=0;
	while(!feof($ass)){
		$line = fgets($ass);

		list($name, $date) = explode(';', $line);
		if(!empty($name)){
			print '
			<tbody>
				<tr>
					<td>'.$name.'</td>
					<td>'.$date.'</td>';
					
					if($_SESSION["sess_acct"]=="student"){
            			//$file = fopen("grades.txt", 'r');
						$file = file("grades.txt");
						$file = array_reverse($file);
						foreach($file as $line){
						//while(!feof($file)){
							//$line = fgets($file);
							list($assign, $stud, $grade) = explode(';', $line);
							if(trim($name)==trim($assign) && $_SESSION["sess_user"]==trim($stud)){
								print ' <td>'.trim($grade).'</td>';
								break;
							}
						}
            		}
            		

		print '</tr>';
		}
	}
	print '</tbody>
			</table>';
	
	?>








<!-- Grade Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set grades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>

        		<form action = "" method="post">
        			
        			<div class="form-group">
    					<label for="" class="control-label">Assignment</label>
    					<select name="ass" class="form-control">
    					<?php
    						$file = fopen('assign.txt', 'r');
							$reg = false;
							while(!feof($file)){
								$line = fgets($file);
								list($ass, $date) = explode(';', $line);
								if(!empty(trim($ass))){
    								print '<option value="'.$ass.'"> '.$ass. ' </option>';
    							}
   							}
   							  
   						?>
    					</select>
  					</div>
        		
        		
            		<div class="form-group">
    					<label for="" class="control-label">Student</label>
    					<select name="stud" class="form-control">
    					<?php
    						$file = fopen('data.txt', 'r');
							$reg = false;
							while(!feof($file)){
								$line = fgets($file);
								list($user, $pass, $acct) = explode(';', $line);
								if(trim($acct)=="student"){
    								print '<option value="'.$user.'"> '.$user. ' </option>';
    							}
   							}
   							  
   						?>
    					</select>
  					</div>
  					
  					<div class="form-group">
    					<label for="" class="control-label">Grade</label>
    					<select name="grade" class="form-control">
    						  <option value="A"> A </option>
    						  <option value="B"> B </option>
    						  <option value="C"> C </option>
    						  <option value="D"> D </option>
    						  <option value="F"> F </option>
    						  
    					</select>
  					</div>
        
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="savebtn" name="submit">Save</button>
        </form>
        <?php
		error_reporting(0);
		if(isset($_POST["submit"])){
			$f=fopen("grades.txt","a+");
			fwrite($f,"\n".$_POST["ass"].";".$_POST["stud"].";".$_POST["grade"]."\r\n");
			fclose($f);
			header("Location: redirect.php");
		}
		?>
      </div>
    </div>
  </div>
</div>







</body></html>