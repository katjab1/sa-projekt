<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Včlanitev</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../drustvo.css">
    <link rel="icon" href="../slike/logo1.png">
    <script src="../skript.js"></script>

</head>

<body>
    <header>
        
            <a href="../index.php"><img src="../slike/logo2.png" alt="logo" class="logo"></a>
        
        <h1>Salon za nego malih živali Šapice</h1>
        <nav id="meni"><img src="../slike/meni.png" alt="meni" id="meni_ikona"></nav>
         <nav id="glavni_meni">
            <ul>
                <li><a href="../index.php">Domov</a></li>
                <li><a href="prijava.php">Prijava</a></li>
                <li><a href="aktivnost.php">Aktivnost</a></li>
                <li><a href="vclanitev.php"  class="aktiven">Včlanitev v klub</a></li>
                <li><a href="../skrbnik.php"><img src="../slike/skrbnik2.png" class="ikonica"></a></li>


            </ul>

        </nav>
    </header>

    <main>
        <h2>Včlanitev v klub</h2>
        <?php if(isset($_GET['error'])) {
            if($_GET['error']=="Registracija uspešna.") {
                $uspeh =$_GET['error'];
                print("<p class='poudarek' style='width:100%; background-color:#A7F8A0; text-align:center;'>$uspeh</p><br>");
            } else {
                $napaka =$_GET['error'];
                print("<p class='poudarek' style='width:100%; text-align:center;'>$napaka</p><br>");
            }
        }
            ?>
    
        <form id="vclanitev" action="vclanitev.php" method="post">
            
                <label for="ime"> Ime:</label>
                <input id="ime" name="ime" maxlenght='16' required><span></span>
               
                <label for="enaslov">E-naslov:</label>
                <input id="enaslov" name="enaslov" type="email" required><span></span>
                
               <label for="geslo">Geslo:</label>  
               <input id="geslo" name="geslo" type="password" minlenght='6' maxlenght='24' required><span></span>
               
               <label for="izbira" class="labelIzbira">Kje ste slišali za nas?</label>
               <select id="izbira" name="izbira">
                    <option value="1">Internet</option>
                    <option value="2">Prijatelji / znanci</option>
                    <option value="3">Oglasi po mestu</option>
                    <option value="4">Drugo</option>
                </select>
                
                <button type="reset" class="pocisti">Počisti</button>
                <button type="submit" name="poslano">Včlani se</button>
        </form>

        <section id="zahvala" class="skrit">
            
        </section>
     
    </main>

        <aside>
        </aside>


        <footer>
            © 2023 Salon za male živali Šapice 
        </footer>

        <?php 
if(isset($_POST["poslano"])) {
 
     $ime = $_POST["ime"];
     $enaslov = $_POST["enaslov"];
     $geslo = $_POST["geslo"];

     $geslo2 = password_hash($geslo, PASSWORD_DEFAULT);   

     require "../povezavazBazo.php";
     $baza=povezi();

     $poizvedba="select * from uporabniki where enaslov='$enaslov'";
     $rezultat = $baza->query($poizvedba);

            if($rezultat->fetch()) {
                       header("Location: vclanitev.php?error=Uporabnik s tem enaslovom že obstaja.") ;
                       exit();
                    }
                    else {
                        $insert ="INSERT INTO uporabniki(ime, enaslov, geslo) VALUES ('$ime', '$enaslov', '$geslo2');";
                        $baza->exec($insert);
                    }

                    header("Location: vclanitev.php?error=Registracija uspešna.") ;
                    exit();

        }

?>




<script>

            let poljeIme = document.getElementById("ime");
            let poljeEnaslov = document.getElementById("enaslov");
            let poljeGeslo = document.getElementById("geslo");

            function krmilnik1(ev) {
                    if(poljeIme.value.length>16) {
                        poljeIme.setCustomValidity("Invalid field.");
                    }
                   
                }
            function krmilnik2(ev) {
                if(poljeGeslo.value.length>24 || poljeGeslo.value.length<6) {
                        poljeGeslo.setCustomValidity("Invalid field.");
                    }
                    else {poljeGeslo.setCustomValidity("");}
                    
            }

            poljeIme.addEventListener("input", krmilnik1);
            poljeGeslo.addEventListener("input", krmilnik2);

            </script>

            <!--

            let preveri = false;
let izpisZahvale = document.getElementById("zahvala");
            function krmilnikZahvala(event) {
                event.preventDefault();
                
                let imeUp = document.getElementById("ime").value;
                let enaslovUp = document.getElementById("enaslov").value;
                let izbiraUp = document.getElementById("izbira").options[document.getElementById("izbira").selectedIndex].text;
                
                let vsebina1 = "Ime: " + imeUp;
                let vsebina2 = "Enaslov: " + enaslovUp;
                let vsebina3 = "Za nas ste izvedeli: " + izbiraUp;
                let izpis1 = document.createElement("p");
                let izpis2 = document.createElement("p");
                let izpis3 = document.createElement("p");
                let gumbZapri = document.createElement("button");
                izpis1.innerHTML = vsebina1;
                izpis2.innerHTML = vsebina2;
                izpis3.innerHTML = vsebina3;
                gumbZapri.innerHTML = "zapri";
                
                if(preveri==true) {
                    return;
                }
                else {
                zahvala.appendChild(izpis1);
                zahvala.appendChild(izpis2);
                zahvala.appendChild(izpis3);
                zahvala.appendChild(gumbZapri);
                izpisZahvale.classList.remove("skrit");
                izpisZahvale.classList.add("pokaziZahvalo");
                preveri=true;
                }

                function krmilnikZapri() {
                    izpisZahvale.classList.add("skrit");
                izpisZahvale.classList.remove("pokaziZahvalo");
                zahvala.removeChild(izpis1);
                zahvala.removeChild(izpis2);
                zahvala.removeChild(izpis3);
                zahvala.removeChild(gumbZapri);
                preveri=false;
                }
                gumbZapri.addEventListener("click", krmilnikZapri);
                }
            vclanitev.addEventListener('submit', krmilnikZahvala);
            

</script>
            -->

</body>
</html>
