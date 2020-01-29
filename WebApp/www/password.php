<?php


$pass = password_hash('azerty', PASSWORD_BCRYPT);

echo $pass;

echo '<br>';


echo "Password OK " . password_verify('azerty', $pass);

echo '<br>';

echo "Password PASOK " . password_verify('glkghdfkjhgjkdfh', $pass);