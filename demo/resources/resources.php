<?php
$id = !empty($_GET['id']) ? basename($_GET['id']) : 'css';

switch($id) 
{
    case 'css': 
        header('Content-Type: text/css;charset=UTF-8');
        $css = '';
        foreach(glob(__DIR__.'/*.png') as $k => $v) {
            $c = basename($v, '.png');
            $n = basename($v);
            $css .= ".".$c.":before { background-image: url('./".$n."') !important;}\n";
        }
        exit($css);
    break;
    case 'js':
        header('Content-Type: application/javascript');
        $js = [];
        foreach(glob(__DIR__.'/*.png') as $k => $v) {
            $c = basename($v, '.png');
            $js[] = "'".$c."'";
        }
        exit('const avatars = ['.implode(',', $js).'];');
    break;
    default:
    break;
}
