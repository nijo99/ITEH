<?php

session_start();

if(isset($_SESSION['loggedIN'])){
	unset($_SESSION['loggedIN']);
    session_destroy();

    header('Location: login.php');
    exit();
}

	//set default  values
	$username = "";
	$email = "";
	$password = "";

	if(count($_POST) > 0){

		require "includes/insertuser.inc.php";
		// require "includes/dbh.inc.php";
		// require "includes/user.inc.php";

		$User = new InsertUser();
		$errors = $User->signup($_POST);

		if(count($errors) == 0){
			
			header("Location: login.php");
			die;

		}

		extract($_POST);
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

<form method="post" style="padding: 10px;border: solid thin #aaa; border-radius: 10px;margin:auto;width: 500px;">
		
		<?php if(isset($errors) && is_array($errors) && count($errors) > 0):?>
			<div class="error">
				<?php foreach($errors as $error):?>
				<?=$error?><br>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<h2>Signup</h2>
		<input class="textbox" type="text" name="username" placeholder="Username" value="<?=$username?>"><br>
		<input class="textbox" type="text" name="email" placeholder="Email" value="<?=$email?>"><br>
		<input class="textbox" type="text" name="password" placeholder="Password" value="<?=$password?>"><br>
		<br>
		<input class="button" type="submit" value="Signup">
		
		<br style="clear: both;">
	</form>
    
</body>
</html>