<?php
// File: pengumuman_list.php

// Memanggil kelas Pengumuman
require_once "Pengumuman.php";

// Membuat objek Pengumuman
$pengumuman = new Pengumuman();
// Mengambil semua data pengumuman
$stmt = $pengumuman->getAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengumuman</title>
    <style>
    /* Gaya sederhana untuk tabel */
    body {
        font-family: Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .container {
        width: 80%;
        margin: 20px auto;
    }

    .btn-tambah {
        display: inline-block;
        margin-bottom: 10px;
        padding: 10px 15px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-aksi {
        text-decoration: none;
        margin-right: 5px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1>Daftar Pengumuman</h1>

        <!-- Link untuk menambah pengumuman baru -->
        <a href="pengumuman_add.php" class="btn-tambah">Tambah Pengumuman Baru</a>

        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Tanggal Buat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
            // Loop melalui hasil query dan tampilkan di tabel
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Ekstrak data menjadi variabel
                extract($row); // Ini akan membuat $id, $judul, $isi, $tanggal_buat
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($judul); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($isi)); ?></td>
                    <!-- Tampilkan isi dengan mempertahankan baris baru -->
                    <td><?php echo $tanggal_buat; ?></td>
                    <td>
                        <!-- Link untuk edit dan hapus -->
                        <a href="pengumuman_edit.php?id=<?php echo $id; ?>" class="btn-aksi">Edit</a> |
                        <a href="pengumuman_delete.php?id=<?php echo $id; ?>" class="btn-aksi"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>