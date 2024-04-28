<?php
session_start();
if(!isset($_SESSION["enaslov"])) {
   header("Location: strani/prijava.php?error=Za dostop do skrbniške strani se je potrebno prijaviti") ;
        exit();
}
else {
?>

<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Skrbnik</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>
<button class="pocisti" onclick="location.href='strani/index.php';">Nazaj na spletno mesto</button>
<h2>Dodaj novo aktivnost</h2>
<button class="pocisti" onclick="location.href='dodajAktivnost.php';">Dodaj novo aktivnost</button>
<h2>Uredi in izbriši aktivnosti</h2>
 
<?php

require_once "povezavazBazo.php";
$baza=povezi();

$sqlStavek = "select * from dogodki;";
$rezultat = $baza->query($sqlStavek);


while($vrstica = $rezultat->fetch()) {
        $aktivnost = $vrstica["ime"];
        $ida = $vrstica["IDdogodka"];
        print("<p class='izpis'>$aktivnost");
        print("<a href='izbrisi.php?id=$ida&ime=$aktivnost'>Izbriši</a>");
        print("<a href='uredi.php?id=$ida'>Uredi</a>");
        print("</p>");
}

}
?>



    
</body>
</html>