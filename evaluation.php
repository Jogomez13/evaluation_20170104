<?php

$file = fopen("questions.qs", "r" );
//ouvrir le fichier, r = Ouvre en lecture seule, et place le pointeur de fichier au début du fichier.

$lines=file("questions.qs");
//file — Lit le fichier et renvoie le résultat dans un tableau
$theme = "##";
// on dit que les themes corresepond au double #
$question = "#";
// un # = une question

$questionnaire = array();

foreach ($lines as $linenumber => $linecontent) {
//(array_expression as $key => $value)

    if (substr($linecontent, 0, 2) == "##") {
/* substr —Retourne le segment de string défini par start et length
Ici start = index 0 et length est la longueur donc cela revient a dire qu'on prend 2 lettres a partir de 0
*/
        echo "\n\n\n\n";
// saut de ligne avant theme

        $theme = $linecontent;
//on stocke le contenu de la ligne dans la catégorie theme

        echo $theme . "\n";

    }

    elseif ($linecontent[0] == '#' and $linecontent[1] != '#') {

        echo "\n";

        $question = $linecontent;
//on stocke le contenu de la ligne dans la catégorie question

        echo $question . "\n";

    }

    elseif ($linecontent[0] == '-')

    {
// si la ligne contient un "-" alors on stocke la ligne dans réponses
        $questionnaire[] = $linecontent;

        echo $linecontent . "\n";

    }

}
