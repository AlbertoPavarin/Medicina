<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function addActivity($data)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "INSERT INTO piano_di_studi     (codice,
                                            nome,
                                            CFU,
                                            ore_lezione,
                                            ore_tirocinio,
                                            ore_laboratorio,
                                            tipo_insegnamento,
                                            semestre,
                                            descrizione_semestre,
                                            anno1,
                                            anno2)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssiiiisisii', $data["codice"], $data["nome"], $data["cfu"],
                                     $data["ore_lezione"], $data["ore_tirocinio"], 
                                     $data["ore_laboratorio"], $data["tipo_insegnamento"], 
                                     $data["semestre"], $data["descrizione_semestre"], 
                                     $data["anno1"], $data["anno2"]);

    return $stmt->execute();
}
?>