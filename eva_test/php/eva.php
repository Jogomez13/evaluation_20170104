<?php

$questions= file("questions.qs"); // Traitement du fichier comme un tableau
$qcm = array(); // Notre questionnaire sur 3 dimensions

$theme=""; // Theme courant
$quest=""; // Question courante
$choix=array(); //  Choix
$reponse=$_POST;

// On parcours le fichier ligne par ligne
for ($i=0; $i < count ($questions); $i++)
{
    // Si les deux premiers caractères sont ## => theme
    if (substr($questions[$i],0,2) == "##")
    {
        $theme = $questions[$i];  // On stock la ligne courante dans la variable theme
        //echo $theme;
    }
    // Si le premier caractère est # => question
    elseif ($questions[$i][0] == "#")
    {
        // Si la variable $quest n'est pas vide = ok
        if (empty($quest) == false) {
            $qcm[$theme][$quest] = $choix;
            $choix=array();
        }

        $quest = $questions[$i];
        //echo "\t" . $quest;
    }
    // Si le premier caractère est - => choix
    elseif ($questions[$i][0] == "-")
    {
        // On rempli notre tableau 3D avec choix courrant,
        // à l'index du theme courrant et sous index question courrante
        $choix[] = str_replace("\n","",$questions[$i]);
        //echo "\t\t" . $questions[$i];
    }
}
//print_r($qcm);


echo '<!DOCTYPE html><html><head><title>QCM Eval</title></head><body>';
echo ' <link rel="stylesheet" type="text/css" href="style.css">';
echo '<form method="post">';

foreach($qcm as $theme => $questionList) {
    echo "<h2>$theme</h2>";

    foreach($questionList as $questionName => $questionChoix) {
        echo "<h3>$questionName</h3>";

        if (empty($questionChoix) == true) {
            echo '<textarea rows="2" cols="50"></textarea>';
        }

        foreach($questionChoix as $choice) {
            echo '<input name="' . $questionName . '" type="radio">' . $choice . "<br>";


        }
    }
}

echo '</form></body></html>';
