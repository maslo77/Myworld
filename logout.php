<?php
    //inicjujemy sesje
    session_start();


    //usuwamy wartosci sesji
    $_SESSION = array();

    //niszczymy sesje
    session_destroy();

    //przekierowanie do logowania
    header('location:login.php');
    exit;