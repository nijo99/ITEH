<?php
include 'includes/dbh.inc.php';
include 'includes/user.inc.php';
include 'includes/viewuser.inc.php';

?>


<?php

session_start();

if(!isset($_SESSION['loggedIN'])) {
    header('Location: login.php');
    exit();
    // uradjeno da ne bi mogao da uneses samo index.php u pretrazi i da ti otvori, nego se 
    // proveri da li je loggedIN
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Televizijski program</title>
    
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css" type="text/css"> 


</head>
<body>
    

<header class="header">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TV PROGRAM</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="#">PRETRAŽI </a></li>
      <li><a href="#">UNESI</a></li>
      <li><a href="#">PROGRAMSKA ŠEMA</a></li>
    </ul>
  </div>
</nav>
</header>

<a href="logout.php"> Log Out</a>
<?php

  $users = new ViewUser();
  $users->show_filtered_users("Sport");

?>
</body>
</html>