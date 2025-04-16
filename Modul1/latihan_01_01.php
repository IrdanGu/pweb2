<?php

class Mahasiswa
{
    public $nama;
    public $nim;

    public function perkenalan()
    {
        return "Halo, nama saya " . $this->nama . " dan NIM saya " . $this->nim;
    }
}

$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Irdan";
$mahasiswa1->nim = "20230910042";

echo $mahasiswa1->perkenalan();

?>