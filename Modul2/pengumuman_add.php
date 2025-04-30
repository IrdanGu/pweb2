<?php
// File: pengumuman_add.php

// Memanggil kelas Pengumuman
require_once "Pengumuman.php";

// Cek apakah ada data yang dikirim melalui metode POST (form disubmit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membuat objek Pengumuman
    $pengumuman = new Pengumuman();

    // Mengisi properti objek dengan data dari form
    $pengumuman->judul = $_POST["judul"];
    $pengumuman->isi = $_POST["isi"];

    // Memanggil metode add() untuk menyimpan data
    if ($pengumuman->add()) {
        // Jika berhasil, redirect ke halaman daftar pengumuman
        header("Location: pengumuman_list.php");
        exit(); // Penting untuk menghentikan eksekusi script setelah redirect
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<p style='color: red;'>Gagal menambah pengumuman.</p>";
    }
}
// Jika bukan metode POST (pertama kali buka halaman), tampilkan form
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        height: 150px;
        resize: vertical;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
    }

    button:hover {
        background-color: #45a049;
    }

    .btn-batal {
        background-color: #f44336;
        text-decoration: none;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .btn-batal:hover {
        background-color: #da190b;
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Tambah Pengumuman Baru</h2>

        <form method="POST" action="">
            <!-- action="" berarti submit ke halaman ini sendiri -->
            <div>
                <label for="judul">Judul Pengumuman:</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div>
                <label for="isi">Isi Pengumuman:</label>
                <textarea id="isi" name="isi" required></textarea>
            </div>
            <div>
                <button type="submit">Simpan Pengumuman</button>
                <a href="pengumuman_list.php" class="btn-batal">Batal</a>
            </div>
        </form>
    </div>

</body>

</html>