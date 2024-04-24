 <?php
 function povezi() {
    
    $host = "localhost"; //lokacija strežnika z bazo
    $db   = "bezjakk"; //ime podatkovne baze

    $user = "bezjakk"; 
    $pass = "zj2aO5Kw";

    $charset = "utf8";
    //prvi parameter konstruktorja
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $povezava = new PDO($dsn, $user, $pass, $opt);
    return $povezava;
 }
 
 
           
        ?>
 