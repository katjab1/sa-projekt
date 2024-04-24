<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Izbris aktivnosti</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>

<h2>Izbriši aktivnost</h2>
 
<?php

            if(isset($_GET["id"]))
                $id=$_GET["id"];
            else
                die("NAPAKA</body></html>");

            require_once "povezavazBazo.php";
            $baza=povezi();

            $sqlStavek1 = "delete from dogodek_datum where IDdogodka=$id;";
            $sqlStavek2 = "delete from dogodki where IDdogodka=$id;";
            $baza->exec($sqlStavek1);
            $baza->exec($sqlStavek2);

            print("<p>Aktivnost izbrisana.</p>");
            print("<button class='pocisti'><a href='skrbnik.php'>Nazaj na urejanje</a></button>");
            print("<button class='pocisti'><a href='strani/index.php'>Nazaj na spletno mesto</a></button>");

        
        ?>
            
</body>
</html>