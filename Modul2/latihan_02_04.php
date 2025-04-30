<?php

class Database
{
    private $host = "localhost"; // Ganti dengan host database Anda jika berbeda
    private $db_name = "dbalumni"; // Ganti dengan nama database Anda
    private $username = "root"; // Ganti dengan nama pengguna database Anda
    private $password = ""; // Ganti dengan kata sandi database Anda
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database sudah terkoneksi!\n"; // Tambahan pesan koneksi berhasil
        } catch (PDOException $exception) {
            echo "Koneksi gagal: " . $exception->getMessage() . "\n";
        }
        return $this->conn;
    }
}

?>