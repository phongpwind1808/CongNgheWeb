<?php
class dbconnection {
    private $host = 'localhost';
    private $dbname = 'qlss';
    private $username = 'root';
    private $password = '';

    public function getConn() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
?>
