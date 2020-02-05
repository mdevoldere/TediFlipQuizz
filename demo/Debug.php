<?php

function d($var = null, $title = null)
{
    echo '<h2>'.$title.'</h2>';
    echo '<pre>';
    echo '<h3>'.gettype($var).'</h3>';
    echo var_export($var, true);
    echo '</pre>';
}
