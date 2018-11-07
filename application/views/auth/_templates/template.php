<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Vary: Accept-Encoding');

if (isset($header))
{
    echo $header;
}

if (isset($content))
{
    echo $content;
}

if (isset($footer))
{
    echo $footer;
}
