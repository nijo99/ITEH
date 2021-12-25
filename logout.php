<?php

    session_start();

    unset($_SESSION['loggedIN']);
    session_destroy();

    header('Location: login.php');
    exit();

    // session_start();

    // unset($_SESSION['registered']);
    // session_destroy();

    // header('Location: login.php');
    // exit();
?>