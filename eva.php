<?php
    $monfichier = fopen('questions.qs', 'r+');
    $stack = array();
    $content = "" ;
    $tabtheme = array();
    $tabquestion = array();
    $tabqcm = array();
    $a = 0;


while(!feof($monfichier))
{
$content = fgets($monfichier);
$lool = array_push($stack, $content);
$i = 0;

$replace = str_replace("##", "", $content);
#echo $replace;

        if(strstr($content, '##'))
        {
        array_push($tabtheme, $content);
        array_push($tabqcm, " ");
        array_push($tabquestion, " ");
        }


        if(strstr($content, '-'))
        {
        array_push($tabqcm, $content);
        array_push($tabtheme, " ");
        array_push($tabquestion, " ");
        }

        elseif(strstr($replace, '#'))
        {
        array_push($tabquestion, $content);
        array_push($tabtheme, " ");
        array_push($tabqcm, " ");
        }



    while($a < count($stack)-1)
    {
    print_r($tabtheme[$a]);
    print_r($tabquestion[$a]);
    print_r($tabqcm[$a]);
    $a++;
    }



}
