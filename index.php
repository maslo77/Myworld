<?php
//inicjujemy sesjee
session_start();
//dolaczamy polaczenie z baza
require_once 'db.php';

// sprawdzamy czy zalogowany
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: login.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <title>Strona Główna</title>
</head>
<body class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-body bg-light mt-5">
                    <h2>Strona Główna <small class="text-muted"><?php echo $_SESSION['email'] ?></small></h2>
                    <p>Witaj w kokpicie <?php echo $_SESSION['name'];?></p>
                    <p><a href="logout.php" class="btn btn-danger">Wyloguj się!</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>