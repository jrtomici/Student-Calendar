<html><head>
<title>Student Calendar - Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #74D9FF;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="user"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
  
</head>
<body>


 <div class="col-md-4 col-md-offset-4">
 <p><a href="register.php" class="text-danger">Register</a> | <a href="login.php" class="text-danger">Login</a></p>



<form action = "" method="post">
    <h2  class="text-danger">Sign in:</h2>
    <label for="lo_login" class="sr-only">Username</label>
    <input type="text" id="lo_login" name="user" class="form-control" placeholder="Username" required autofocus value="">
    <label for="lo_pwd" class="sr-only">Password</label>
    <input type="password" id="lo_pwd" name="pass" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-warning btn-block" type="submit" name="submit">Sign in</button>
    <button class="btn btn-lg btn-danger btn-block" type = "reset"  id = "reset"/>Reset fields</button?>
    </form>


</div> <!-- /container -->

<?php
error_reporting(0);
	if(isset($_POST["submit"])){
		if(!empty($_POST['user']) && !empty($_POST['pass'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			
			$file = fopen('data.txt', 'r');
			$reg = false;
			while(!feof($file)){
				$line = fgets($file);

				list($user, $pass, $acct) = explode(';', $line);

				if(trim($user) == $_POST['user'] && trim($pass) == $_POST['pass']){
					$reg = true;
					break;
				}
			}

			if($reg){
				session_start();
				$_SESSION['sess_user']=$user;
				$_SESSION['sess_acct']=trim($acct);
				$_SESSION['expire'] = time()+60;

				/* Redirect browser */
				if(trim($acct)=="student") {
					header("Location: StudentCalendar.php");
				}
				else {
					header("Location: TeacherCalendar.php");
				}
			}
		}
		else {
			echo "Invalid";
		}
	}


?>

</body>
</html>