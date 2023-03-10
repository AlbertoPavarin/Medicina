<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function updateUnity($codice, $data)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "UPDATE piano_di_studi pds
            SET 
                nome = ?,
                CFU = ?,
                settore = ?,
                n_settore = ?,
                TAF_Ambito = ?,
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
    $stmt->bind_param('sisisiiisisiis', $data["nome"], $data["cfu"], $data["settore"], $data["n_settore"], $data["TAF_ambito"], 
                                     $data["ore_lezione"], $data["ore_tirocinio"], 
                                     $data["ore_laboratorio"], $data["tipo_insegnamento"], 
                                     $data["semestre"], $data["descrizione_semestre"], 
                                     $data["anno1"], $data["anno2"], $codice);
    if($stmt->execute())
    {
        $sql = "UPDATE formativa_didattica
                SET formativa = ?
                WHERE didattica = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $data["attivita"], $codice);
        var_dump($stmt->execute());
        return $stmt->execute();
    }

    return false;
}
?>