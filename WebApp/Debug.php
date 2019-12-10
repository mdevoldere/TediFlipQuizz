<?php

function d($var = null)
{
    echo '<pre>';
    echo '<h3>'.gettype($var).'</h3>';
    echo var_export($var, true);
    echo '</pre>';
}

