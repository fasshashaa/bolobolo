<?php
class Database {
    private $host = '160.19.166.42'; // Host database Anda
    private $db_name = '2B_klp6';    // Nama database Anda
    private $username = '2B_klp6';   // Username database
    private $password = 'wWsOIVYp7Nmvj96_'; // Password database
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>
