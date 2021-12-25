


<?php

    session_start();

    if(isset($_SESSION['loggedIN'])){
        header('Location: index.php');
        exit();
    }


    if (isset($_POST['login'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname='loginform';

        $connection = new mysqli($servername, $username, $password, $dbname);
        

        $email = $connection->real_escape_string($_POST['emailPHP']);
        $password = $connection->real_escape_string($_POST['passwordPHP']);

        $query="SELECT id FROM users WHERE email='$email' AND password='$password'";
        $data = $connection->query($query);

        if($data-> num_rows > 0){
            $_SESSION['loggedIN']='1';
            // $_SESSION['email'] = $email;
            exit('Uspesno ste se ulogovali!');
        } else
            exit("Neuspesan pokusaj! Probajte opet.");

        // exit($email . " = " . $password);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="login.php">
        <input type="text" id="email" placeholder="Email..."><br>
        <input type="password" id="password" placeholder="Password..."><br>
        <input type="button" value="Log In" id="login"> 
        <!-- koristi se button a ne submit da ne bi refreshovao stranicu -->


    </form>

    <div><a href="signup.php">Registruj se</a></div>

    <p id="response"></p>

    <script 
     src="https://code.jquery.com/jquery-3.6.0.min.js"
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
     crossorigin="anonymous">
    </script>

    <script type="text/javascript">

            $(document).ready(function () {
                $("#login").on('click', function (){
                    var email = $("#email").val();
                    var password = $("#password").val();

                    if (email == "" || password == "")
                        alert("Polja ne mogu biti prazna");


                    else{

                        $.ajax(
                        {
                            url: 'login.php',
                            method: 'POST',
                            data: {
                                login: 1,
                                emailPHP: email,
                                passwordPHP: password
                            },
                            success: function(response){
                                $("#response").html(response);

                                if (response.indexOf('Uspesno') >=0)
                                    window.location = 'index.php';

                            },
                            dataType: 'text'
                        }
                    );
                    }

                    
                    
                });
            });

    </script>

</body>
</html>