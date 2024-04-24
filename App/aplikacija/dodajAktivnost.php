<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Dodaj aktivnost</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">


    </head>
<body>
<button class="pocisti" onclick="location.href='skrbnik.php';">Nazaj</button>

<h2>Dodaj novo aktivnost</h2>

    <form action="dodajAktivnost.php" method="post">
        <label for="imeAktivnosti">Ime aktivnosti: </label>
        <input type="text" required name="ime" id="imeAktivnosti">
        <p>Prostor aktivnosti: </p>
        <input type="radio" id="uscmb" name="prostorAktivnosti" value="USCMB" required >
        <label for="uscmb">UŠC Maribor</label><br>
        <input type="radio" id="veldv" name="prostorAktivnosti" value="VELDV">
        <label for="veldv">Velika dvorana</label><br>
        <input type="radio" id="zundv" name="prostorAktivnosti" value="ZUNDV">
        <label for="zundv">Zunanje dvorišče</label><br><br>

        <label for="opisAktivnosti">Opis aktivnosti: </label>
        <input type="text" required name="opis" id="opisAktivnosti"><br><br>

        <label for="datumID">ID datuma: </label>
        <input type="text" required name="IDdatuma" id="datumID"><br><br>

        <label for="datum">Datum: </label>
        <input type="text" required  name="datum" id="datum"><br><br>


        <button type="submit" name="poslano" value="da">Dodaj aktivnost</button>

        <h2>Dodajanje datumov</h2>
        <button class="pocisti" onclick="location.href='dodajDatum.php';">Dodaj nove datume</button>


<?php 
if(isset($_POST["poslano"])) {
 
     $imeA = $_POST["ime"];
     $prostorA = $_POST["prostorAktivnosti"];
     $opisA = $_POST["opis"];
     $datumID = $_POST["IDdatuma"];
     $datum = $_POST["datum"];

     require "povezavazBazo.php";
     $baza=povezi();
     $insert="INSERT INTO dogodki(ime,sifraP,opis) VALUES ('$imeA', '$prostorA','$opisA');";
     $baza->exec($insert);

     $poizvedba="select * from datumi where IDdatuma=$datumID;";
     $rezultat = $baza->query($poizvedba);
     $preverjanje=0;

            if($rezultat->fetch()) {
                        $poizvedba2="select * from dogodki where ime='$imeA';";
                        $rezultat = $baza->query($poizvedba2);
                        while($vrstica = $rezultat->fetch()) {
                            $idDogodka = $vrstica["IDdogodka"];
                        }
                        $insert2="INSERT INTO dogodek_datum(IDdogodka,IDdatuma) VALUES ('$idDogodka', '$datumID');";
                        $baza->exec($insert2);
                
                    }
                    else {
                        $insert3="INSERT INTO datumi(IDdatuma, datum) VALUES ('$datumID', '$datum');";
                        $baza->exec($insert3);
                        $poizvedba3="select * from dogodki where ime='$imeA';";
                        $rezultat = $baza->query($poizvedba3);
                        while($vrstica = $rezultat->fetch()) {
                            $idDogodka = $vrstica["IDdogodka"];
                        }
                        $insert4="INSERT INTO dogodek_datum(IDdogodka,IDdatuma) VALUES ('$idDogodka', '$datumID');";
                            $baza->exec($insert4);
                        
                    }

            
           

            print("<br><br>Prejeti podatki: ");
            print("<br>".$imeA."<br>".$prostorA."<br>".$opisA."<br>".$datumID."<br>".$datum."<br>");
    

        }

?>

    
</body>
</html>