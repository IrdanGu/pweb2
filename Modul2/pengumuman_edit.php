<?php
// File: pengumuman_edit.php

// Memanggil kelas Pengumuman
require_once "Pengumuman.php";

// Buat objek Pengumuman
$pengumuman = new Pengumuman();
$data = null; // Variabel untuk menyimpan data pengumuman yang akan diedit

// Cek apakah ada parameter ID di URL
if (isset($_GET["id"])) {
    $pengumuman->id = $_GET["id"]; // Set ID pengumuman yang akan diedit

    // Ambil data pengumuman berdasarkan ID
    $stmt = $pengumuman->getById();
    $data = $stmt->fetch(PDO::FETCH_ASSOC); // Ambil satu baris data

    // Jika data tidak ditemukan, tampilkan pesan error
    if (!$data) {
        echo "Data pengumuman tidak ditemukan!";
        exit; // Hentikan eksekusi
    }
} else {
    // Jika tidak ada ID di URL, tampilkan pesan error
    echo "ID pengumuman tidak diberikan!";
    exit; // Hentikan eksekusi
}

// Cek apakah ada data yang dikirim melalui metode POST (form disubmit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengisi properti objek dengan data dari form
    $pengumuman->id = $_POST["id"]; // ID diambil dari hidden field
    $pengumuman->judul = $_POST["judul"];
    $pengumuman->isi = $_POST["isi"];

    // Memanggil metode update() untuk menyimpan perubahan
    if ($pengumuman->update()) {
        // Jika berhasil, redirect ke halaman daftar pengumuman
        header("Location: pengumuman_list.php");
        exit(); // Penting untuk menghentikan eksekusi script setelah redirect
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<p style='color: red;'>Gagal memperbarui pengumuman.</p>";
    }
}
// Jika bukan metode POST (pertama kali buka halaman), tampilkan form dengan data terisi
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
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
        <h2>Edit Pengumuman</h2>

        <form method="POST" action="">
            <!-- action="" berarti submit ke halaman ini sendiri -->
            <!-- Hidden field untuk menyimpan ID pengumuman -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

            <div>
                <label for="judul">Judul Pengumuman:</label>
                <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>"
                    required>
            </div>
            <div>
                <label for="isi">Isi Pengumuman:</label>
                <textarea id="isi" name="isi" required><?php echo htmlspecialchars($data['isi']); ?></textarea>
            </div>
            <div>
                <button type="submit">Update Pengumuman</button>
                <a href="pengumuman_list.php" class="btn-batal">Batal</a>
            </div>
        </form>
    </div>

</body>

</html>