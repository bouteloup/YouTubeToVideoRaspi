<?php
/**
 * @Author: remy
 * @Date:   2015-07-24 17:01:35
 * @Last Modified by:   remy
 * @Last Modified time: 2015-07-26 18:42:59
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

    </body>


</html>