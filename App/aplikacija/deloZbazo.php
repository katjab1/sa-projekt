<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>PHP objekti</title>
        <meta charset="utf-8">
    </head>
<body>
        <?php

            //korak1-povezava z bazo
            require_once "povezavazBazo.php";
            $baza=povezi();

            $sqlStavek = "select dogodki.IDdogodka, dogodki.ime AS ime, dogodki.opis, prostori.ime AS prostor, datumi.datum from dogodki
            inner join dogodek_datum ON dogodki.IDdogodka=dogodek_datum.IDdogodka
            inner join prostori ON dogodki.sifraP=prostori.sifraP
            inner join datumi ON dogodek_datum.IDdatuma=datumi.IDdatuma;";
            $rezultat = $baza->query($sqlStavek);

            print("<ul>");
            while($vrstica = $rezultat->fetch()) {
                $polje=$vrstica;
                   print_r($polje);
                    $ida = $vrstica["ime"];
                    $ime = $vrstica["opis"];
                    $pri = $vrstica["prostor"];

                    print("<li>$ime $pri ");
                    print("<a href='izbrisi.php?id=$ida'>Izbrisi </a>");
                    print("<a href=''>Uredi</a>");
                    print("</li>");

            }

            print("</ul>");

        ?>

    
    
</body>
</html>