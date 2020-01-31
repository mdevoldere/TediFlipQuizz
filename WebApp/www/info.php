<?php 

$timeTarget = 0.1; // 100 millisecondes

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Valeur de 'cost' la plus appropriée : " . $cost;