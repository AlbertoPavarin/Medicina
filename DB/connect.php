<?php
class Database
{
    protected $conn;

    public function connect()
    {
        try
        {
            $this->conn = new mysqli("localhost", "root", "", "medicina");
        }
        catch(Exception $ex)
        {
            echo "Error, $ex";
        }
        return $this->conn;
    }
}

$db = new Database();
$db->connect();
?>