<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Dodaj aktivnost</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>
<button class="pocisti" onclick="location.href='skrbnik.php';">Nazaj</button>
<h2>Uredi aktivnost</h2>

<?php

if(isset($_GET["id"])) {
    $id=$_GET["id"];
    require_once "povezavazBazo.php";
    $baza = povezi();
    $sql = "select * from dogodki where IDdogodka=$id";
    $rezultat = $baza->query($sql);
    $vrstica = $rezultat->fetch();
    if($vrstica) {
        $ime = $vrstica["ime"];
        $opis = $vrstica["opis"];
        $prostor=$vrstica["sifraP"];
        $sql2 = "select * from dogodek_datum where IDdogodka=$id";
        $rezultat = $baza->query($sql2);
        $IDdatumi=[];
        $datumi=[];
        while($vrstica = $rezultat->fetch()) {
            $IDdatumi[]=$vrstica["IDdatuma"];
        }
        for($i=0; $i < count($IDdatumi); $i++) {
            $sql3 = "select * from datumi where IDdatuma=$IDdatumi[$i]";
            $rezultat = $baza->query($sql3);
            while($vrstica = $rezultat->fetch()) {
                $datumi[]=$vrstica["datum"];
            }
        }
        
    }
    else {
        die("<p>Napačen ID</p></body></html>");
    }
    ?>
    <form action="uredi.php" method="post">
        <input type="hidden" name="IDdogodka" value="<?php print($id);?>">
        <label for="ime">Ime aktivnosti: </label>
        <input name="ime" id="ime" required value="<?php print($ime);?>"> <br>

        <p>Prostor aktivnosti: </p>
        <input type="radio" id="uscmb" name="prostorAktivnosti" value="USCMB" required <?php if($prostor=="USCMB") print("checked");?>>
        <label for="uscmb">UŠC Maribor</label><br>
        <input type="radio" id="veldv" name="prostorAktivnosti" value="VELDV"<?php if($prostor=="VELDV") print("checked");?>>
        <label for="veldv">Velika dvorana</label><br>
        <input type="radio" id="zundv" name="prostorAktivnosti" value="ZUNDV" <?php if($prostor=="ZUNDV") print("checked");?>>
        <label for="zundv">Zunanje dvorišče</label><br><br>

        <label for="opis">Opis aktivnosti: </label>
        <input name="opis" id="opis" style="width:300px;" required value="<?php print($opis);?>"> <br><br>
        <button type="submit" name="poslano">Posodobi</button>

        <p>Datumi: <br>
        <?php 
        for($i=0; $i < count($datumi); $i++) {
            print($datumi[$i]);
            $idD=$IDdatumi[$i];
            if(count($datumi)>1)
            print("<a href='izbrisiDatum.php?idD=$idD&idA=$id'>Izbriši</a>");
            print("<br>");
        }
        if(count($datumi)==1) 
        print("Dodaj nov datum, nato lahko tega tudi izbrišeš.<br>");
        print("<br><button><a href='dodajDatum.php?ida=$id&ime=$ime'>Dodaj datum</a></button>"); 
        ?>
        
        </p>
        
    </form>

        <?php
           }

           else {
            if(!isset($_POST["poslano"]))
                print("<p>Ni ID podatka</p>");
                
            else {
                require_once "povezavazBazo.php";
                $baza = povezi();
                $id=$_POST["IDdogodka"];
                $ime=$_POST["ime"];
                $opis=$_POST["opis"];
                $sifrap=$_POST["prostorAktivnosti"];
                 
                    $sql ="update dogodki set ime='$ime', opis='$opis', sifraP='$sifrap' where IDdogodka=$id";
                

                $rezultat = $baza->exec($sql);
                if($rezultat!=0) {
                    print("<p>Podatki posodobljeni.</p>");
                    print("<button class='pocisti'><a href='skrbnik.php'>Nazaj na urejanje</a></button>");
                    print("<button class='pocisti'><a href='strani/index.php'>Nazaj na spletno mesto</a></button>");
                }
                else {
                    print("<p>Ni sprememb.</p>");
                    print("<button class='pocisti'><a href='skrbnik.php'>Nazaj na urejanje</a></button>");
                    print("<button class='pocisti'><a href='strani/index.php'>Nazaj na spletno mesto</a></button>");
                }


            }
           }
            

        ?>

    
</body>
</html>