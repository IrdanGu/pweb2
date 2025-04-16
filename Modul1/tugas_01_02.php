<?php

class Hewan
{
    public $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function bersuara()
    {
        return "$this->nama membuat suara (suara hewan umum).";
    }
}

class Anjing extends Hewan
{
    public function bersuara()
    {
        return "$this->nama menggonggong: Guk guk!";
    }
}

class Kucing extends Hewan
{
    public function bersuara()
    {
        return "$this->nama mengeong: Meow!";
    }
}

$hewanUmum = new Hewan("Hewan Misterius");
$anjing1 = new Anjing("Buddy");
$kucing1 = new Kucing("Whiskers");

echo $hewanUmum->bersuara() . "\n";
echo $anjing1->bersuara() . "\n";
echo $kucing1->bersuara() . "\n";

?>