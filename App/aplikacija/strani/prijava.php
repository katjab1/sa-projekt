<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Prijava</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../drustvo.css">
    <link rel="icon" href="../slike/logo1.png">
    <script src="../skript.js"></script>

</head>

<body>
    <header>
        
            <a href="index.php"><img src="../slike/logo2.png" alt="logo" class="logo"></a>
        
        <h1>Salon za nego malih živali Šapice</h1>
        <nav id="meni"><img src="../slike/meni.png" alt="meni" id="meni_ikona"></nav>
         <nav id="glavni_meni">
            <ul>
                <li><a href="index.php">Domov</a></li>
                <li><a href="prijava.php"  class="aktiven">Prijava</a></li>
                <li><a href="aktivnost.php">Aktivnost</a></li>
                <li><a href="vclanitev.php">Včlanitev v klub</a></li>
                <li><a href="../skrbnik.php"><img src="../slike/skrbnik2.png" class="ikonica"></a></li>


            </ul>

        </nav>
    </header>

    <main>
        <h2>Prijava za člane</h2>
        <?php if(isset($_GET['error'])) {
                $napaka=$_GET['error'];
                print("<p class='poudarek' style='width:100%; text-align:center;'>$napaka</p><br>");
            }
            ?>
        <section id="izpis"></section>
        <form id="prijava" action="prijava.php" method="post">
                <label for="enaslov">Elektronski naslov: </label>
                <input id="enaslov" name="enaslov" type="email" required> 
            
                <label for="geslo">Geslo: </label>
                <input id="geslo" name="geslo" type="password" required>
           
                <button type="submit" name="poslano" id="gumbPrijava" >Prijavi se</button>
        </form>
        
    </main>

        <aside>
        </aside>


        <footer>
            © 2023 Salon za male živali Šapice
        </footer>

        <?php 
if(isset($_POST["poslano"])) {

     $enaslov = $_POST["enaslov"];
     $geslo = $_POST["geslo"];

     require "../povezavazBazo.php";
     $baza=povezi();

     $poizvedba="select * from uporabniki where enaslov='$enaslov'";
     $rezultat = $baza->query($poizvedba);


     if($rezultat->rowCount()!=1) {
        header("Location: prijava.php?error=Uporabnik s tem enaslovom ne obstaja") ;
                       exit();
     } else {
     $vrstica=$rezultat->fetch();
            if(password_verify($geslo,$vrstica["geslo"])) {
                       $_SESSION["enaslov"]=$vrstica["enaslov"];
                       header("Location: index.php?msg=prijava") ;
                       exit();
                    }
                    else {
                        header("Location: prijava.php?error=Napačno geslo") ;
                       exit();
                    }

        }
    }

?>


<script>
            let poljeGeslo = document.getElementById("geslo");

            function krmilnik2(ev) {
                if(poljeGeslo.value.length>24 || poljeGeslo.value.length<6) {
                        poljeGeslo.setCustomValidity("Invalid field.");
                    }
                    else {poljeGeslo.setCustomValidity("");}
                    
            }

            poljeGeslo.addEventListener("input", krmilnik2);

            </script>

<!--

        <script>
            let gumbPrijava = document.getElementById("gumbPrijava");
            let izpis = document.getElementById("izpis");
            

            function krmilnikPrijava(event) {
                event.preventDefault();
                let enaslovUporabnika = document.getElementById("enaslov").value;
                let gesloUporabnika = document.getElementById("geslo").value;
                if(enaslovUporabnika != "" && gesloUporabnika != "") {
                let vsebina1 = "Stran je v izdelavi."
                let vsebina = "Dobrodošel / dobrodošla " + enaslovUporabnika;
                let izpisP = document.createElement("p");
                let izpisH = document.createElement("h3");
                izpisP.innerHTML = vsebina1;
                izpisH.innerHTML = vsebina;
                izpis.appendChild(izpisH);
                izpis.appendChild(izpisP);
                izpis.classList.toggle("pokaziIzpis");
                }
           }
            gumbPrijava.addEventListener('click', krmilnikPrijava);
            
        </script>
        -->
</body>
</html>
