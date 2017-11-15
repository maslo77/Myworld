<?php
    //dolaczamy polaczenie z baza
    require_once 'db.php';
    //inicjujemy zmienne
    $name = $email = $password = $confirm_password='';
    $name_err = $email_err = $password_err = $confirm_password_err ='';

    //po kliknieciu rejestruj
    if($_SERVER['REQUEST_METHOD']==='POST'){
        // organizacja post 
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password= trim($_POST['confirm_password']);

        //walidacja email
        if(empty($email)){
            $email_err = 'Podaj Adres email';
        } else {
            //przygotowanie polecenia
            $sql='SELECT id FROM users where email = :email';
            if($stmt = $pdo->prepare($sql)){
                //tworzymy zmienne
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);

                //wywołanie
                if($stmt->execute()){
                    //sprawdzanie jesli email istnieje
                    if($stmt->rowCount() === 1){
                        $email_err= 'Email jest zajety!<a href="login.php"> Zaloguj się</a>';
                    }
                } else{
                    die('cos nie poszlo');
                }

            }
            unset($stmt);
        }
        //walidacja loginu
        if(empty($name)){
            $name_err='Podaj login';
        }
        //hasla
        if(empty($password)){
            $password_err = 'Podaj hasło';

        }elseif(strlen($password < 6)){
            $password_err='Wymagane jest hasło składające się z przynajmniej 6 znaków.';
        }
        //Potwierdzanie hasła
        if(empty($confirm_password)){
            $confirm_password_err='Podaj hasło jeszcze raz';

        }
        else{
            if($password !== $confirm_password){
                $confirm_password_err = 'Hasła nie pasują';
            }
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

    <title>Mój świat-Rejestracja</title>
</head>
<body class="bg-primary">
 <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Rejestracja</h2>
                <p>Wypełnij pola aby zarejestrować się</p>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
                    <div class="form-group">
                        <label for="name">Login</label>
                        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : '';?>" value="<?php echo $name;?>">
                        <span class="invalid-feedback"><?php echo $name_err ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Adres e-mail</label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : '';?>" value="<?php echo $email?>">
                        <span class="invalid-feedback"><?php echo $email_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : '';?>" value="<?php echo $password;?>">
                        <span class="invalid-feedback"><?php echo $password_err;?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Powtórz Hasło</label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : '';?>" value="<?php echo $confirm_password ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="Zarejestruj" class="btn btn-success btn-block">

                        </div>
                        <div class="col">
                            <a href="login.php" class="btn btn-light btn-block">Masz już konto?Zaloguj się!</a>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
 </div>
    
</body>
</html>