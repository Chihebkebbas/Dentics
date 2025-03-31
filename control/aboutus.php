<?php 

$basePath    = './templates/front/';
$headersPath = $basePath . 'headers/';
$footersPath = $basePath . 'footers/';
$page = 'aboutus';

include($headersPath . 'header_secondary.php');
include($basePath . $page . '/main.php');
include($footersPath . 'footer_main.php');
