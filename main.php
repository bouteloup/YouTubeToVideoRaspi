<?php
/**
 * @Author: remy
 * @Date:   2015-05-06 19:10:55
 * @Last Modified by:   remy
 * @Last Modified time: 2015-07-28 11:32:20
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        
        <!-- Police d'écritures -->
        <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
        
        <link rel="icon" type="image/png" href="icon.png" /> 
        <title>YouTube Manager</title>
    </head>

    <body>





    <?php

        // Ce code php permet d'éviter le message "Renvoi du formulaire" lors du raffraichissement de la page. 
        session_start();


        if(!empty($_POST) OR !empty($_FILES))
        {
            $_SESSION['sauvegarde'] = $_POST ;
            $_SESSION['sauvegardeFILES'] = $_FILES ;
            
            $fichierActuel = $_SERVER['PHP_SELF'] ;
            if(!empty($_SERVER['QUERY_STRING']))
            {
                $fichierActuel .= '?' . $_SERVER['QUERY_STRING'] ;
            }
            
            header('Location: ' . $fichierActuel);
            exit;
        }

        if(isset($_SESSION['sauvegarde']))
        {
            $_POST = $_SESSION['sauvegarde'] ;
            $_FILES = $_SESSION['sauvegardeFILES'] ;
            
            unset($_SESSION['sauvegarde'], $_SESSION['sauvegardeFILES']);
        }


    ?>



    <?php
        // Variables
        $a="20";
        $z="1";
        $x="1";


        $URL = array(
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
        );

        $duree = array(
            "20",
            "21",
            "22",
            "23",
            "24",
            "25",
            "26",
            "27",
            "28",
            "29",
        );

        $caseGrise = array(
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
        );
    ?>


        <!-- Affichage du titre princiaple -->
        <div class="titreHaut global">
            Envoi vidéo Youtube --> HDMI Raspberry Pi
        </div>



        <!-- Affichage de l'heure actuelle -->
        <div class="heure">
            <?php
            setlocale(LC_TIME, 'fr_FR.UTF8');
            $Heures = strftime('%H');
            $Minutes = strftime('%M');
            $DateDuJour = strftime('%H : %M');
            $DateDuJour = ucfirst($DateDuJour);
            $DateModif = $DateDuJour;
            echo "Il est : " . $DateDuJour;
            ?>
        </div>

        <!-- Bouton pour appeler la fonction ci dessus ! -->
        <FORM class="ButtonReset" ACTION="main.php" method="post">
            <input type = "submit" name = "ButtonReset" value = "Réinitialiser !">
        </FORM>

        

        <!-- Tableau principal -->
        <table class="tableau">

            <tr>
                <!-- Affichages lignes -->
                <th> N° </th>
                <th> Vidéo YouTube URL </th>
                <th> Durée (mn) </th>
                <th> Ajout heure de fin vidéo </th>
            </tr>

                <?php
                    $monFichierTxtURL = fopen('URL.txt', 'a+');

                    // Tant que l'on est pas à la fin du fichier
                    while (!feof($monFichierTxtURL))
                    {
                        // On lit la ligne courante
                        $caseGrise[$x] = fgets($monFichierTxtURL);
                        $x++;
                    }




                // Affiche 10 fois
                for ($i = 1; $i < 11; $i++)
                {

                    ?>
                    <tr>

                        <?php
                            if ($caseGrise[$i - 1] == null)
                            {
                                $caseGrise[$i] = null;
                            }
                        ?>


                        <!-- Affichage lignes vert ou pas -->
                        <?php
                            if (!empty($caseGrise[$i]))
                            {
                                ?>
                                    <td class="ZoneDeTexteNumero"> <?php echo $i; ?> </td>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <td> <?php echo $i; ?> </td>
                                <?php
                            }
                        ?>

                        
                        <!-- Méthode POST - Affiche les zones de textes et boutons "Add time" -->
                        <form method="post" action="main.php">

                        <?php
                            if (!empty($caseGrise[$i]))
                            {
                                ?>
                                    <td> <input type="text" name="<?php echo $i; ?>" size="60" class="ZoneDeTexteUrl" value="Vidéo ajoutée" disabled="disbabled" style="text-align:center;"> </td>
                                    <td> <input type="text" name="<?php echo $a; ?>" size="7" disabled="disbabled" style="text-align:center;"> </td>
                                    <td> <input type ="submit" disabled="disbabled" value ="Add time"> </td>
                                <?php
                            }
                            
                            else
                            {
                                ?>
                                    <td> <input type="text" name="<?php echo $i; ?>" size="60" placeholder="URL" style="text-align:center;"> </td>
                                    <td> <input type="text" name="<?php echo $a; ?>" size="7" placeholder="Temps (mn)" style="text-align:center;"> </td>
                                    <td> <input type ="submit" name="ButtonAddTime" value ="Add time"> </td>
                                <?php
                            }
                        ?>
                        </form>
                    </tr>


                    <?php
                    // Incrémentation nom zone de texte
                    $a++;

                }

                ?>
            </table>


            <!-- Récupération de la durée entrée par l'utilisateur -->
            <?php

            
            // Place les URL fourni dans les variables d'un tableau
            for ($i = 1; $i < 11; $i++)
            {
                $URL[$i] = $_POST[$i];
            }

            // Place les durées fournient dans les variables d'un second tableau
            for ($i = 20; $i < 30; $i++)
            {
                $duree[$i] = $_POST[$i];
            }




            // Place les URL dans le fichier txt URL
            for ($i = 1; $i < 11; $i++)
            {
                if (!empty($URL[$i]))
                {
                    $monFichierTxtURL = fopen('URL.txt', 'a+');
                    fputs($monFichierTxtURL, $URL[$i]);
                    fputs($monFichierTxtURL, "\n");
                    fclose($monFichierTxtURL);
                }
            }

            for ($i = 20; $i < 30; $i++)
            {
                // Si l'utilisateur insére une durée alors ...
                
                    // Récupère les heures et minutes modifiés dans le fichier txt
                    $monFichierTxtHeureModifie = fopen('heureModifie.txt', 'a+');
                    $heureModifie = fgets($monFichierTxtHeureModifie);
                    $minuteModifie = fgets($monFichierTxtHeureModifie);

                    // Si 1ère durée inséré alors ...
                    if (empty($heureModifie))
                    {
                        $Minutes = $Minutes + $duree[$i];
                    }


                    else
                    {
                        $Minutes = $minuteModifie + $duree[$i];
                        $Heures = $heureModifie;
                    }


                    // Incrémentation de l'heure quand minutes > 60
                    while ($Minutes >= 60)
                    {
                        if ($Minutes == 60)
                        {
                            $Minutes = 0;
                            $Heures = $Heures + 1;
                        }

                        else
                        {
                            $Minutes = $Minutes - 60;
                            $Heures = $Heures + 1;
                        }

                        if ($Heures == 24)
                        {
                            $Heures = "00";
                        }
                    }


                    // Permet de mettre un "0" devant les minutes inférieurs à "10"
                    if ($Minutes < 10)
                    {
                        $Minutes = str_pad($Minutes, 2, "0", STR_PAD_LEFT);
                    }


                    // Supprime les vieux espaces et saut de ligne des deux chaines de caractères
                    $Heures = trim($Heures);
                    $Minutes = trim($Minutes);


                    // Écrase toutes les données du fichier txt
                    ftruncate($monFichierTxtHeureModifie, 0);
                    fputs($monFichierTxtHeureModifie, $Heures);
                    fputs($monFichierTxtHeureModifie, "\n");
                    fputs($monFichierTxtHeureModifie, $Minutes);
                    fclose($monFichierTxtHeureModifie);
                
            }
            ?>



            <!-- Affichage "fin pour" -->
            <div class="heure global">
                <?php
                    echo "Fin pour : " .$Heures. " : " .$Minutes;
                ?>
            </div>


            <?php 
                // Fonction reset -> Reset du contenu des fichies textes
                function resetAll()
                {
                    $monFichierTxtURL = fopen('URL.txt', 'a+');
                    ftruncate($monFichierTxtURL, 0);
                    fclose($monFichierTxtURL);

                    $monFichierTxtHeureModifie = fopen('heureModifie.txt', 'a+');
                    ftruncate($monFichierTxtHeureModifie, 0);
                    fclose($monFichierTxtHeureModifie);
                }
            ?>

            <!-- Envoyer le flux ! -->
            <FORM class="boutonEnvoiFLux" ACTION="EnvoiFlux.php">
                <input type = "submit" value = "Envoyer le flux !" >
            </FORM>           



            <!-- Si bouton cliqué -> reset valeurs -->
            <?php
                if (isset($_POST['ButtonReset']))
                {
                    resetAll();

                    ?>
                        <meta http-equiv="refresh" content="0; url=main.php" />
                    <?php
                }
            ?>

            <!-- Si bouton cliqué -> reset page -->
            <?php
                if (isset($_POST['ButtonAddTime']))
                {
                    ?>
                        <meta http-equiv="refresh" content="0; url=main.php" />
                    <?php
                }
            ?>

    </body>
</html>
