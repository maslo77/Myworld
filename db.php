<?php
//Dane do bazy danych;
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME', 'myworld');


//połączenie z bazą danych
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
}catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>