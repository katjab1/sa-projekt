<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Šapice</title>
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
            <?php 
                if(!isset($_SESSION["enaslov"])) {
                ?>
                <li><a href="index.php" class="aktiven">Domov</a></li>
                <li><a href="prijava.php">Prijava</a></li>
                <li><a href="aktivnost.php">Aktivnost</a></li>
                <li><a href="vclanitev.php">Včlanitev v klub</a></li>                
                <li><a href="../skrbnik.php"><img src="../slike/skrbnik2.png" class="ikonica"></a></li>
<?php
                }
else {
?>

                <li><a href="index.php" class="aktiven">Domov</a></li>
                <li><a href="aktivnost.php">Aktivnost</a></li>   
                <li><a href="odjava.php">Odjava  <img src="../slike/izhod.png" width="16px"></a></li>            
                <li><a href="../skrbnik.php"><img src="../slike/skrbnik2.png" class="ikonica"></a></li>
 <?php } ?>

            </ul>

        </nav>

    </header>

    <main>
    <h2 class="poudarek" style='background-color:#A7F8A0;'>Prijava uspešna!</h2>

        <p>
            Šapice so namišljen salon za male živali za potrebe razvoja spletne aplikacije.
            Predstavljajmo si, da ga je ustanovila ekipa mladih, ki jih veže ljubezen do živali in skrb zanje, v želji
            po kvalitetni oskrbi naših ljubljenčkov.
        </p>
        <h2 class="poudarek">Včlanite se v naš klub! &#11088;</h2>
        <p>Nudimo tudi naš klub Ljubitelji Šapic. Članstvo prinaša dodatne ugodnosti, aktivnosti in izobraževanja.</p>
        <div class="slike">
        <img src="../slike/pes.png" alt="pes" class="slika1">
        <img src="../slike/tacka.png" alt="tacka" class="slika1">
    
        <img src="../slike/macka.png" alt="macka" class="slika1">
        <img src="../slike/zajec.png" alt="zajec" class="slika1">
        </div>
        
        <h2>Naša načela</h2>
        <p>
            Prizadevamo si predvsem za:
            strokovnost, skrbnost, čim boljšo nego, pomoč lastnikom, videz naših ljubljenčkov.
            Saloni niso potrebni le za urejanje živali za razstave.
            Ponujamo to možnost in verjamemo, da bodo v naših rokah dosegali modne trende.
            Vendar lepota se kaže tudi skozi zdravje in zadovoljstvo in to postavljamo na prvo mesto.
            Podjetje je nastalo v želji po čim boljši negi in skrbi za <strong>vse male živali.</strong>
        </p>

        <h2>Zaposleni</h2>
        <div class="slike">
        <img src="../slike/ursa.jpg" alt="ursa" class="slika1">
        <img src="../slike/marko.jpg" alt="marko" class="slika1">
    
        <img src="../slike/katja.jpg" alt="katja" class="slika1">
        <img src="../slike/anja.jpg" alt="anja" class="slika1">
        </div>
        
    </main>

        <aside>
        </aside>


        <footer>
            © 2023 Salon za male živali Šapice
        </footer>

</body>
</html>
