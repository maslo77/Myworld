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
                <h2>Stwórz Konto</h2>
                <p>Wypełnij pola aby zarejestrować się</p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Imię</label>
                        <input type="text" name="name" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Adres e-mail</label>
                        <input type="email" name="email" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło</label>
                        <input type="password" name="password" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Powtórz Hasło</label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback"></span>
                    </div>

            </form>
            </div>
        </div>
    </div>
 </div>
    
</body>
</html>