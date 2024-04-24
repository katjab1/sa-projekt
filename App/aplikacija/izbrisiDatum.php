<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Izbris aktivnosti</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>

<h2>Izbriši datum</h2>
 
<?php

            if(isset($_GET["idD"])&&isset($_GET["idA"])) {
                $idDatuma=$_GET["idD"];
                $idAktivnosti=$_GET["idA"];}
            else
                die("NAPAKA</body></html>");

            require_once "povezavazBazo.php";
            $baza=povezi();

            $sqlStavek = "delete from dogodek_datum where IDdogodka=$idAktivnosti and IDdatuma=$idDatuma";
            $baza->exec($sqlStavek);

            print("<p>Datum dogodka izbrisan.</p>");
            print("<button class='pocisti'><a href='skrbnik.php'>Nazaj na urejanje</a></button>");

        ?>
            
</body>
</html>