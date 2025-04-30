<?php

class Alumni
{
    private $nama;
    private $jurusan;

    public function __construct($nama, $jurusan)
    {
        $this->nama = $nama;
        $this->jurusan = $jurusan;
    }

    public function tampilkanProfil()
    {
        return "Nama: $this->nama\nJurusan: $this->jurusan\n";
    }
}

$alumni = new Alumni("Irdan", "Teknik Informatika");
echo $alumni->tampilkanProfil();

?>