<html><head>
<title>Student Calendar - Registration</title>
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
    <h2 class="text-danger">Registration form:</h2>
    <label for="lo_login" class="sr-only">Username</label>
    <input type="text" id="lo_login" name="user" class="form-control" placeholder="Username" required autofocus value="">
    <label for="lo_pwd" class="sr-only">Password</label>
    <input type="password" id="lo_pwd" name="pass" class="form-control" placeholder="Password" required>
    <label for="lo_pwd2" class="sr-only">Confirm password</label>
    <input type="password" id="lo_pwd2" name="pass2" class="form-control" placeholder="Confirm password" required>
    <label for="lo_code" class="sr-only">Class code</label>
    <input type="text" id="lo_code" name="code" class="form-control" placeholder="Class code" required autofocus value="">
    <button class="btn btn-lg btn-warning btn-block" type="submit" name="submit">Create account</button>
    <button class="btn btn-lg btn-danger btn-block" type = "reset"  id = "reset"/>Reset fields</button?>
</form>


</div> <!-- /container -->

<?php
if(isset($_POST["submit"])){

	if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['code'])) {
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$pass2=$_POST['pass2'];
		$acct="student";
		$code=$_POST['code'];
		
		$c=fopen("code.txt","r");
		$cd=fgets($c);
		if($pass==$pass2 && $_POST['code']==$cd){
			$f=fopen("data.txt","a+");
			fwrite($f,"\n".$_POST["user"].";".$_POST["pass"].";".$acct);
			fclose($f);

			echo "Account Successfully Created";
			header("Location: login.php");
		}
		else {
			header("Location: register.php");
			echo "Passwords do not match/class code not recognized";
		}
	}
}
?>

</body>
</html>