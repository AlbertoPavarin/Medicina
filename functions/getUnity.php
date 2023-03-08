<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function getUnity($codice)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT codice, nome, CFU, settore, n_settore, TAF_ambito, ore_lezione, ore_tirocinio, ore_laboratorio, tipo_insegnamento, semestre, descrizione_semestre, anno1, anno2
            FROM piano_di_studi pds
            WHERE codice = " . $conn->real_escape_string($codice) . ";";

    return $conn->query($sql);
}
?>