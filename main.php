<?php
$page = $_GET['page'];
switch ($page) {
    case 0:
        include("pages/login.php");
        break;
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