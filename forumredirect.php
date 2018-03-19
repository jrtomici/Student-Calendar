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
	
	$file = fopen('data.txt', 'r');
			$reg = false;
			while(!feof($file)){
				$line = fgets($file);

				list($user, $pass, $acct) = explode(';', $line);

				if(trim($user) == $_SESSION['sess_user']){
					$reg = true;
					break;
				}
			}

			if($reg){
				/* Redirect browser */
				if(trim($acct)=="student") {
					header("Location: forum.php");
				}
				else {
					header("Location: adminforum.php");
				}
			}
		

?>