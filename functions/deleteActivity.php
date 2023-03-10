<?php
include_once dirname(__FILE__) . '/../DB/connect.php';

function deleteUnity($codice)
{
    $db = new Database();
    $conn = $db->connect();

    $sql = "DELETE FROM piano_di_studi
            WHERE codice = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $codice);
    return $stmt->execute();
}
?>