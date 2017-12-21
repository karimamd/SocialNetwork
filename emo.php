<?php

function convertText($string){
$patterns = array();
$patterns[0] = '/(:P|:p)/';
$patterns[1] = '/(:d|:D)/';
//$patterns[2] = '/:-|/';
$replacements = array();
//$replacements[2] = '\u{1F617}';
$replacements[1] = "\u{1F600}";
$replacements[0] = "\u{1F61B}";
ksort($patterns);
ksort($replacements);

$text= preg_replace($patterns, $replacements, $string);
return $text;
}

?>