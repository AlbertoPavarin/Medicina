<?php

include_once dirname(__FILE__) . '/functions/getArchiveActivities.php';
include_once dirname(__FILE__) . '/functions/checkLogin.php';

if (!isset($_GET['page']))
{
    $user = checkLogin(); // checkLogin
    if ($user)
    {
        header("Location: index.php?page=1");
    }
}

$page = $_GET['page'];
switch ($page) {
    case 1:
        include("pages/attivitaDidattiche.php");
        break;
    case 2:
        include("pages/editAttivita.php");
        break;
    case 3:
        include("pages/unita.php");
        break;
    case 4:
        include("pages/editUnita.php");
        break;
    default:
        include("pages/content-404.php");
}
?>