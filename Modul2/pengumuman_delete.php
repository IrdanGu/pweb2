<?php
// File: pengumuman_delete.php

// Memanggil kelas Pengumuman
require_once "Pengumuman.php";

// Membuat objek Pengumuman
$pengumuman = new Pengumuman();

// Cek apakah ada parameter ID di URL
if (isset($_GET["id"])) {
    $pengumuman->id = $_GET["id"]; // Set ID pengumuman yang akan dihapus

    // Memanggil metode delete()
    if ($pengumuman->delete()) {
        // Jika berhasil dihapus, redirect ke halaman daftar pengumuman
        header("Location: pengumuman_list.php");
        exit(); // Penting untuk menghentikan eksekusi script setelah redirect
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<p style='color: red;'>Gagal menghapus pengumuman.</p>";
    }
} else {
    // Jika tidak ada ID di URL, tampilkan pesan error
    echo "<p style='color: red;'>ID pengumuman tidak diberikan!</p>";
}

// Catatan: File ini tidak menampilkan tampilan HTML, hanya memproses penghapusan
// dan kemudian mengarahkan pengguna kembali.
?>