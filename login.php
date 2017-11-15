<?php
    //dolaczamy polaczenie z baza
    require_once 'db.php';
    //inicjujemy zmienne
    $email = $password = '';
    $email_err = $password_err= '';

    //po kliknieciu rejestruj
    if($_SERVER['REQUEST_METHOD']==='POST'){
        // organizacja post 
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(empty($email)){
            $email_err='Podaj login';
        }
        //hasla
        if(empty($password)){
            $password_err = 'Podaj hasło';
        }
         //sprawdzanie czy error jest pusty
         if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
            die('VALIDATION PASSED');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <title>Mój świat-Logowanie</title>
</head>
<body class="bg-primary">
 <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Zaloguj się</h2>
                <p>Wypełnij pola aby zalogować się</p>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                    <div class="form-group">
                        <label for="email">Adres e-mail</label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : '';?>" value="<?php echo $email ?>">
                        <span class="invalid-feedback"><?php echo $password_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : '';?>" value="<?php echo $password;?>">
                        <span class="invalid-feedback"><?php echo $password_err;?></span>
                    </div>
                    
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="Zaloguj" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="register.php" class="btn btn-light btn-block">Nie masz konta? Zarejestruj się!</a>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
 </div>
    
</body>
</html>