<?php

include_once dirname(__FILE__) . '/../DB/connect.php';

function getUser($id)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT u.nome, u.cognome, u.email, r.descrizione
            FROM utente u 
            INNER JOIN ruolo r ON r.id = u.ruolo
            WHERE u.id = " . $conn->real_escape_string($id) . ";";


    return $conn->query($sql)->fetch_assoc();
}

?>