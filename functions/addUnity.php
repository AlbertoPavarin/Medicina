<?php
include_once dirname(__FILE__) . '/../DB/connect.php';
include_once dirname(__FILE__) . '/getArchiveActivities.php';

function addUnity($data)
{ 
    $db = new Database();
    $conn = $db->connect();

    $sql = "INSERT INTO piano_di_studi     (codice,
                                            nome,
                                            CFU,
                                            settore,
                                            n_settore,
                                            TAF_Ambito,
                                            ore_lezione,
                                            ore_tirocinio,
                                            ore_laboratorio,
                                            tipo_insegnamento,
                                            semestre,
                                            descrizione_semestre,
                                            anno1,
                                            anno2)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssisisiiisisii', $data["codice"], $data["nome"], $data["cfu"], $data["settore"], $data["n_settore"], $data["TAF_ambito"], 
                                     $data["ore_lezione"], $data["ore_tirocinio"], 
                                     $data["ore_laboratorio"], $data["tipo_insegnamento"], 
                                     $data["semestre"], $data["descrizione_semestre"], 
                                     $data["anno1"], $data["anno2"]);

    if ($stmt->execute())
    {
        $sql = "INSERT INTO formativa_didattica(formativa, didattica)
                VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $data["attivita"], $data["codice"]);

        return $stmt->execute();
    }

    return false;
}
?>