 <?php
 function povezi() {
    
    $host = "localhost"; //lokacija strežnika z bazo
    $db   = "aktivnosti"; //ime podatkovne baze

    $user = "root"; 
    $pass = "root";

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
 