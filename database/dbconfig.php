<?php
class Database
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port;
    public $conn;

    public function __construct()
    {
        // Check if server is localhost or not
        if (
            isset($_SERVER['SERVER_NAME']) &&
            ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1')
        ) {
            // Localhost connection
            $this->host = "127.0.0.1";
            $this->port = "3306";
            $this->db_name = "magrent";
            $this->username = "root";
            $this->password = "";
        } else {
            // Live server connection
            $this->host = "localhost"; // Change this if live DB is remote
            $this->port = "3306"; // Optional, but you can keep it
            $this->db_name = "u297724503_magrent_2023";
            $this->username = "u297724503_magrent_2023";
            $this->password = "Magrent_2023";
        }
    }

    public function dbConnection()
    {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage()); // Better for debugging
        }

        return $this->conn;
    }
}
?>
