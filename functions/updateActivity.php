<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function updateActivity($codice, $data)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "UPDATE piano_di_studi pds
            SET 
                nome = ?,
                CFU = ?,
                ore_lezione = ?,
                ore_tirocinio = ?,
                ore_laboratorio = ?,
                tipo_insegnamento = ?,
                semestre = ?,
                descrizione_semestre = ?,
                anno1 = ?,
                anno2 = ?
            WHERE codice = ?";
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('siiiisisiis', $data["nome"], $data["cfu"], 
                                     $data["ore_lezione"], $data["ore_tirocinio"], 
                                     $data["ore_laboratorio"], $data["tipo_insegnamento"], 
                                     $data["semestre"], $data["descrizione_semestre"], 
                                     $data["anno1"], $data["anno2"], $codice);

    return $stmt->execute();
}
?>