<?php
session_start();
// Cr�er une constantes pour le nombre de DIV
$NBDIV = 0;

// Cr�er une fonction qui retourne une couleur al�atoire au format string de 6
// chiffres hexadecimal, par exemple '0B34A9', chaque couleur est au format RVB 
// (rouge, vert bleu) dont 2 caract�res hexad�cimal correspondent � chacune de ces couleurs
function couleuraleatoire() {
    $coloralea = "";
    for ($i = 0; $i < 3; $i++) {
        // On tir un chiffre al�atoirement entre 0 et 255
        $rnd = rand(0, 255);
        // On transforme notre chiffre tir� en hexad�cimal
        $colorRnd = dechex($rnd);
        // Si le chiffre hexad�cimal ne prend qu'un seul caract�re (par exemple 'A') on le 
        if (strlen($colorRnd) == 1) {
            $colorRnd = '0' . $colorRnd;
        }
        // transforme en '0A' car une couleur en CSS est toujours faite de 6 caract�res
        // On renvoi la couleur al�atoire cr��e, par exemple '0AFF00'
        $coloralea = $coloralea . $colorRnd;
    }
    return $coloralea;
}

function lol2() {

    return ' <div style="border:1px solid black; width: 50px;height: 50px;  margin-top:25px; margin-left:25px; display: inline-block; background-color: #' . couleuraleatoire() . ';   "></div>';
}

function lol() {
    $var1 = 1;
    $jour = 6;
    $var1++;
    echo ' <section style=" border:1px solid black; width: 100px;height: 100px; display: inline-block;background-color: #' . couleuraleatoire() . ';   ">' . lol2() . '</section>';


    if ($var1 == 6) {


        $jour = 0;
        $var1 = 1;
    }
}

// Une fonction qui retourne l'inverse d'une couleur au format string de 6 chiffres hexadecimal, 
// par exemple si on envoi 'FF0000' cela retourne '00FFFF', une couleur est toujours au format RVB et pour l'inverser
// il suffit de soustraire la valeur de chaque couleur au maximum possible dans chaque couleur.
function inversecouleur($color) {

    $C1 = dechex(255-hexdec(substr($color, 1, 2)));
    $C2 = dechex(255-hexdec(substr($color, 3, 2)));
    $C3 = dechex(255-hexdec(substr($color, 5, 2)));
    
    if (strlen($C1) == 1) {
        $C1 = '0'.$C1;
        
    }
      elseif (strlen($C2) == 1) {
        $C2 = '0'.$C2;
        
    }
      elseif (strlen($C3) == 1) {
        $C3 = '0'.$C3;
        
    }
    $color = strtoupper($C1) . strtoupper($C2) . strtoupper($C3);
    return '#'.$color;
    // On prend les caract�res de la couleur $color deux par deux et
    // on les mets dans des variables
    // On transforme les paires de 2 caract�res en d�cimal
    // On inverse chaque partie de la couleur en la soustrayant au maximum (255)
    // On remet chaque partie de la couleur en hexad�cimal
    // Si le nombre hexad�cimal ne prend qu'un caract�re (par exemple 'A') on le 
    // transforme en '0A' car une couleur est toujours faite de 6 caract�res
    // On retourne l'inverse de la couleur fournie $color
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>CSS Dynamique</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content="0.001"/>
        <style type="text/css" media="all">
            body {

                width: 800px;
                height: 600px;
                margin: auto;
                font-family: Arial, "Arial Black", Georgia, "Times New Roman", Times, serif;
                background-color: <?php
                echo '#' . couleuraleatoire();
                ?>
            }			

            <?php
// Cr�er des classes CSS avec des propri�t�s pour les DIV principaux et pour les DIV secondaires
// Les DIV principaux ont des couleurs al�atoires et les DIV secondaires des couleurs inverses � ceux-ci
            ?>
        </style>
    </head>

    <body>
        <br />	

        <?php
        // Pour chaque DIV cr�er un autre DIV � l'int�rieur avec les bons ID en CSS
        for ($i = 1; $i <= 28; $i++) {
            lol();
        }
        ?>	
    </body>
</html>