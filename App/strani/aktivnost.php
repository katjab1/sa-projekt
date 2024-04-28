<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Aktivnost</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../drustvo.css">
    <link rel="icon" href="../slike/logo1.png">
    <script src="../dogodki.php"></script>
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
                <li><a href="../index.php">Domov</a></li>
                <li><a href="prijava.php">Prijava</a></li>
                <li><a href="aktivnost.php"  class="aktiven">Aktivnost</a></li>
                <li><a href="vclanitev.php">Včlanitev v klub</a></li>                
                <li><a href="../skrbnik.php"><img src="../slike/skrbnik2.png" class="ikonica"></a></li>
<?php
                }
else {
?>

                <li><a href="../index.php">Domov</a></li>
                <li><a href="aktivnost.php"  class="aktiven">Aktivnost</a></li> 
                <li><a href="odjava.php">Odjava  <img src="../slike/izhod.png" width="16px"></a></li>                 
                <li><a href="../skrbnik.php"><img src="../slike/skrbnik2.png" class="ikonica"></a></li>
 <?php } ?>
            </ul>

        </nav>
    </header>

    <main>
        <h2>Naše storitve</h2>
        <h3>Naš salon vam ponuja naslednje storitve:</h3>
        <div class="seznamStoritev">
        <ul>
            <li>krtačenje,</li>
            <li>kopanje in sušenje,</li>
            <li>striženje,</li>
        </ul>

        <ul>
            <li>trimanje,</li>
            <li>nega tačk, blazinic,</li>
            <li>celotna nega,</li>
        </ul>

        <ul>
            <li>nega okolice oči,</li>
            <li>sluhovodov,</li>
            <li>čiščenje ušes,</li>
        </ul>

        <ul>
            <li>tretma proti zajedavcem,</li>
            <li>veterinarstvo,</li>
            <li>svetovanje.</li>

        </ul></div>
        <h2 class="poudarek">Ob prvem obisku brezplačen posvet z veterinarjem! &#128054;</h2>
        <p>
            Strankam se lahko ugodi njenim željam in se živali postrižejo ali uredijo po njihovih izbiri.
            Uporabljamo naravne, živalim prijazne izdelke, na voljo vam je tudi veterinarsko svetovanje v primeru bolezni ali težav.
            Pohvalimo se lahko z odlično podkovanim osebjem, ki zagotavlja kakovostne storitve.
        </p>

        <h2>Urnik aktivnosti</h2>

        <div id="aktivnosti1">
        </div>
       

    </main>

        <aside>
        </aside>


        <footer>
            © 2023 Salon za male živali Šapice 
        </footer>

<script>


let aktivnosti = document.getElementById("aktivnosti1");

function dodaj() {
    dogodki.forEach(
(el) => {
    let novaTabela = `<table><tr><th>${el.ime}</th></tr>
                        <tr><td>${el.datum}</td></tr>
                        <tr><td>${el.prostor}</td></tr>
                        <tr><td>${el.opis}</td></tr></table>`;
    let novA = document.createElement("table");
    aktivnosti.appendChild(novA);
    novA.outerHTML = novaTabela;
    });
};

dodaj();
</script>
</body>
</html>
