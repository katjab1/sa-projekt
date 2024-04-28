<?php
header("Content-type: text/javascript");


            //korak1-povezava z bazo
            require_once "povezavazBazo.php";
            $baza=povezi();

            $sqlStavek = "select dogodki.IDdogodka, dogodki.ime AS ime, dogodki.opis, prostori.ime AS prostor, datumi.datum from dogodki
            inner join dogodek_datum ON dogodki.IDdogodka=dogodek_datum.IDdogodka
            inner join prostori ON dogodki.sifraP=prostori.sifraP
            inner join datumi ON dogodek_datum.IDdatuma=datumi.IDdatuma;";
            $rezultat = $baza->query($sqlStavek);
            $datumi2 = [];
            $stevilo = $rezultat->rowCount();
            $stevec = 0;
            while($vrstica = $rezultat->fetch()) {
                $stevec++;
                if(!empty($polje)) {
                        $temp = end($polje);
                        $id = $vrstica["IDdogodka"];
                        
                        if($temp["IDdogodka"] == $id) {
                            if($stevec==$stevilo) {
                                if(empty($datumi2)) {
                                    $datumi2[] = $polje[key($polje)]["datum"][0];
                                    }
                                    $datumi2[]=$vrstica["datum"];
                                    $polje[key($polje)]["datum"]=$datumi2;
                            }
                            else {
                                if(empty($datumi2)) {
                                $datumi2[] = $polje[key($polje)]["datum"][0];
                                }
                                $datumi2[]=$vrstica["datum"];
                            }
                        }
                        else {
                        if(!empty($datumi2)) {
                              $polje[key($polje)]["datum"]=$datumi2;
                              $datumi2=[];
                              $polje[]=$vrstica;
                        $datumi = [];
                        $datumi[] =$vrstica["datum"];
                        $polje[key($polje)+1]["datum"]=$datumi;
                        }
                        else {
                        $polje[]=$vrstica;
                        $datumi = [];
                        $datumi[] =$vrstica["datum"];
                        $polje[key($polje)+1]["datum"]=$datumi;
                        }
            }
        }
            else {
                $polje[]=$vrstica;
                $datumi = [];
                $datumi[] =$vrstica["datum"];
                $polje[0]["datum"]=$datumi;
        }
}

        
        //print($niz);
        for ($i=0; $i < count($polje); $i++) {
            if(count($polje[$i]["datum"]) > 1) {
                for($j=1; $j < count($polje[$i]["datum"]); $j++) {
                    $temp=$polje[$i]["datum"][$j];
                    $polje[$i]["datum"][$j]="<br><br>$temp";
                }
            }
        }
    	
        $niz = json_encode($polje);
        print("let dogodki = JSON.parse('$niz');");
        ?>