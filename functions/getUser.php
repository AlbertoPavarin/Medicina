<?php

include_once dirname(__FILE__) . '/../DB/connect.php';

function getUser($id)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT u.nome, u.cognome, u.email, u.ruolo
            FROM utente u 
            INNER JOIN ruolo r ON r.id = u.ruolo
            WHERE id = " . $conn->real_escape_string($id) . ";";

    var_dump($conn->query($sql)->fetch_assoc());

    return $conn->query($sql)->fetch_assoc();
}

?>