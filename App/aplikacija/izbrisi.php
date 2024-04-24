<!DOCTYPE html>
<html lang="sl">
    <head>
        <title>Izbriši aktivnost</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="skrbnik.css">

    </head>
<body>

<h2>Izbriši aktivnost</h2>
 
<?php
            
            if(isset($_GET["id"])&&isset($_GET["ime"])) {
                $id=$_GET["id"];
                $ime=$_GET["ime"];
                print ("Ali res želite izbrisati aktivnost $ime ?<br><br>");
                print("<button><a href='izbris.php?id=$id'>Da, izbriši</a></button>");
                print("<button class='pocisti'><a href='skrbnik.php'>Ne, vrni se nazaj</a></button>");

            }
            else
                die("NAPAKA</body></html>");

        
        ?>
            
</body>
</html>