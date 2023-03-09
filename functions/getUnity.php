<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function getUnity($codice)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT pds2.codice, pds2.nome, pds2.CFU, pds2.settore, pds2.n_settore, pds2.TAF_ambito, pds2.ore_lezione, pds2.ore_tirocinio, pds2.ore_laboratorio, pds2.tipo_insegnamento, pds2.semestre, pds2.descrizione_semestre, pds2.anno1, pds2.anno2, fd.formativa, pds.nome as nome_form
            FROM medicina.formativa_didattica fd 
            INNER JOIN medicina.piano_di_studi pds ON fd.formativa = pds.codice 
            INNER JOIN medicina.piano_di_studi pds2 ON fd.didattica = pds2.codice
            WHERE pds2.codice = " . $conn->real_escape_string($codice) . ";";

    return $conn->query($sql);
}
?>