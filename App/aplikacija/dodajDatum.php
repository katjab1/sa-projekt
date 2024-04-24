<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Skrbnik</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>
<button class="pocisti" onclick="location.href='skrbnik.php';">Nazaj na urejanje</button>

<h2>Dodaj datume</h2>
 

<?php

if(!isset($_GET["ida"])) {

        require_once "povezavazBazo.php";
        $baza=povezi();

        $sqlStavek = "select * from dogodki;";
        $rezultat = $baza->query($sqlStavek);


while($vrstica = $rezultat->fetch()) {
        $aktivnost = $vrstica["ime"];
        $ida = $vrstica["IDdogodka"];
        print("<p class='izpis'>$aktivnost <br><br>");
        print("<button><a href='dodajDatum.php?ida=$ida&ime=$aktivnost'>Dodaj datum</a></button>");    
    }
}

else {
    $aktivnost = $_GET["ime"];
    $ida = $_GET["ida"];
    print("<p>Aktivnost $aktivnost </p>")
    
?>
<form action="dodajanjeDatuma.php" method="post">
<input type="hidden" name="IDdogodka" value="<?php print($ida);?>">
<label for="datumID">ID datuma: </label>
        <input type="text" required name="IDdatuma" id="datumID"><br><br>

        <label for="datum">Datum: </label>
        <input type="text" required  name="datum" id="datum"><br><br>
        <button type="submit" name="poslano" value="da">Dodaj datum</button>
</form>

<?php
}
?>

    
</body>
</html>