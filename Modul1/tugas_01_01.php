<?php

class Pegawai
{
    public $nama;
    public $jabatan;
    public $gaji;

    public function __construct($nama, $jabatan, $gaji)
    {
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->gaji = $gaji;
    }

    public function tampilkanInfo()
    {
        return "Nama: " . $this->nama . ", Jabatan: " . $this->jabatan . ", Gaji: Rp " . number_format($this->gaji, 0, ',', '.');
    }
}

// Membuat objek Pegawai
$pegawai1 = new Pegawai("Irdan", "Manager", 5000000);
$pegawai2 = new Pegawai("Siti", "Staff Administrasi", 3500000);

// Menampilkan informasi pegawai
echo "Informasi Pegawai 1: " . $pegawai1->tampilkanInfo() . "\n";
echo "Informasi Pegawai 2: " . $pegawai2->tampilkanInfo() . "\n";

?>