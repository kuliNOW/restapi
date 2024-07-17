<?php
class Database
{
    public $conn;
    private $db_host = 'localhost';
    private $db_name = 'rapi';
    private $db_username = 'root';
    private $db_password = '';

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>