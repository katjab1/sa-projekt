<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Skrbnik</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>
<button class='pocisti' onclick="location.href='skrbnik.php';">Nazaj na urejanje</button>
<h2>Dodaj datume</h2>
 

<?php
        $aktivnost = $_POST["IDdogodka"];
        $datumID = $_POST["IDdatuma"];
        $datum = $_POST["datum"];

        require_once "povezavazBazo.php";
        $baza=povezi();
        
        $poizvedba="select * from datumi where IDdatuma=$datumID;";
             $rezultat = $baza->query($poizvedba);
        
                    if($rezultat->fetch()) {
                                
                                $insert2="INSERT INTO dogodek_datum(IDdogodka,IDdatuma) VALUES ('$aktivnost', '$datumID');";
                                $baza->exec($insert2);
                        
                            }
                            else {
                                $insert3="INSERT INTO datumi(IDdatuma, datum) VALUES ('$datumID', '$datum');";
                                $baza->exec($insert3);
                                $insert4="INSERT INTO dogodek_datum(IDdogodka,IDdatuma) VALUES ('$aktivnost', '$datumID');";
                                    $baza->exec($insert4);
                                
                            }
        
                    
                   
        
                    print("Prejeti podatki: ");
                    print("<br>".$datumID."<br>".$datum."<br>");
                    print("<br><button class='pocisti'><a href='dodajDatum.php'>Dodajanje datumov</a></button>");
            
    
?>

    
</body>
</html>