<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function getArchiveActivities()
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT DISTINCT pds.codice, pds.nome, pds.CFU, IF(pds.ore_lezione IS NOT NULL, pds.ore_lezione, 0) AS lezione, IF(pds.ore_laboratorio IS NOT NULL, pds.ore_laboratorio, 0) AS laboratorio, IF(pds.ore_tirocinio IS NOT NULL, pds.ore_tirocinio, 0) AS tirocinio
            FROM piano_di_studi pds
            WHERE pds.codice NOT IN (SELECT fd.didattica
                                FROM formativa_didattica fd)
            ";

    return $conn->query($sql);
}
?>