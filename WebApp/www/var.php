<?php
$test = "julien";
$var = 'test'; // La valeur de $var est égal au nom de la variable $test
$var2 = $$var;
echo $var2;
echo '<br>';
echo $$var;
