<?php
// File: Pengumuman.php

// Memastikan file Database.php di-include
require_once "latihan_02_04.php";

class Pengumuman
{
    // Koneksi database
    private $conn;
    // Nama tabel
    private $table_name = "pengumuman";

    // Properti objek
    public $id;
    public $judul;
    public $isi;
    public $tanggal_buat; // Tambahkan properti untuk tanggal

    // Konstruktor dengan koneksi DB
    public function __construct()
    {
        // Mengambil koneksi dari kelas Database
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    // Metode untuk membaca semua pengumuman
    public function getAll()
    {
        // Query untuk mengambil semua data
        $query = "SELECT id, judul, isi, tanggal_buat FROM " . $this->table_name . " ORDER BY tanggal_buat DESC";
        // Menyiapkan statement
        $stmt = $this->conn->prepare($query);
        // Menjalankan query
        $stmt->execute();
        // Mengembalikan hasil statement
        return $stmt;
    }

    // Metode untuk membaca satu pengumuman berdasarkan ID
    public function getById()
    {
        // Query untuk mengambil satu data berdasarkan ID
        $query = "SELECT id, judul, isi, tanggal_buat FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        // Menyiapkan statement
        $stmt = $this->conn->prepare($query);
        // Mengikat parameter ID
        $stmt->bindParam(":id", $this->id);
        // Menjalankan query
        $stmt->execute();
        // Mengembalikan hasil statement (biasanya perlu fetch nanti)
        return $stmt;
    }

    // Metode untuk menambah pengumuman baru
    public function add()
    {
        // Query untuk insert data baru
        // Kita tidak perlu menginsert id (auto-increment) atau tanggal_buat (default value)
        $query = "INSERT INTO " . $this->table_name . " (judul, isi) VALUES (:judul, :isi)";
        // Menyiapkan statement
        $stmt = $this->conn->prepare($query);

        // Membersihkan data (misalnya menghindari HTML/script injection sederhana)
        // Dalam aplikasi nyata, gunakan sanitasi yang lebih kuat!
        $this->judul = htmlspecialchars(strip_tags($this->judul));
        $this->isi = htmlspecialchars(strip_tags($this->isi));

        // Mengikat parameter
        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":isi", $this->isi);

        // Menjalankan query
        if ($stmt->execute()) {
            return true; // Berhasil
        }
        return false; // Gagal
    }

    // Metode untuk memperbarui pengumuman yang sudah ada
    public function update()
    {
        // Query untuk update data
        $query = "UPDATE " . $this->table_name . " SET judul = :judul, isi = :isi WHERE id = :id";
        // Menyiapkan statement
        $stmt = $this->conn->prepare($query);

        // Membersihkan data
        $this->judul = htmlspecialchars(strip_tags($this->judul));
        $this->isi = htmlspecialchars(strip_tags($this->isi));

        // Mengikat parameter
        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":isi", $this->isi);
        $stmt->bindParam(":id", $this->id); // Jangan lupa ID untuk kondisi WHERE

        // Menjalankan query
        if ($stmt->execute()) {
            return true; // Berhasil
        }
        return false; // Gagal
    }

    // Metode untuk menghapus pengumuman
    public function delete()
    {
        // Query untuk delete data
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        // Menyiapkan statement
        $stmt = $this->conn->prepare($query);

        // Mengikat parameter ID
        $stmt->bindParam(":id", $this->id);

        // Menjalankan query
        if ($stmt->execute()) {
            return true; // Berhasil
        }
        return false; // Gagal
    }
}
?>