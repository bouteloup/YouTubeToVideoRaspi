<?php
/**
 * @Author: remy
 * @Date:   2015-07-24 16:45:32
 * @Last Modified by:   remy
 * @Last Modified time: 2015-07-26 19:27:37
 */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/png" href="icon.png" /> 
        <title>YouTube Manager</title>
    </head>

    <body>

    <?php

                // Récupère les heures et minutes modifiés dans le fichier txt
                $monFichierTxtURL = fopen('URL.txt', 'a+');

                $URL1 = fgets($monFichierTxtURL);
                $URL2 = fgets($monFichierTxtURL);
                $URL3 = fgets($monFichierTxtURL);
                $URL4 = fgets($monFichierTxtURL);
                $URL5 = fgets($monFichierTxtURL);
                $URL6 = fgets($monFichierTxtURL);
                $URL7 = fgets($monFichierTxtURL);
                $URL8 = fgets($monFichierTxtURL);
                $URL9 = fgets($monFichierTxtURL);
                $URL10 = fgets($monFichierTxtURL);

                fclose($monFichierTxtURL);

                // Supprime les vieux espaces et saut de ligne des deux chaines de caractères
                $URL1 = trim($URL1);
                $URL2 = trim($URL2);
                $URL3 = trim($URL3);
                $URL4 = trim($URL4);
                $URL5 = trim($URL5);
                $URL6 = trim($URL6);
                $URL7 = trim($URL7);
                $URL8 = trim($URL8);
                $URL9 = trim($URL9);
                $URL10 = trim($URL10);


                // Execution du script bash permettant de lancer les vidéos à la suite grâce aux URL donnés par le User
                shell_exec("./main.sh $URL1 $URL2 $URL3 $URL4 $URL5 $URL6 $URL7 $URL8 $URL9 $URL10");
                ?>
    </body>
</html>