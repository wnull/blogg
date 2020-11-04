<?php

if (empty($_SESSION['active']))
{
    require dirname(__DIR__) . '/404.php';
    exit;
}