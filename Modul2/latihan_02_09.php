<?php 
require_once "latihan_02_05.php"; 
$alumni = new Alumni(); 
if (isset($_GET["id"])) { 
    $alumni->id = $_GET["id"]; 
    if ($alumni->delete()) { 
        header("Location: latihan_02_06.php"); 
        exit; 
    } else { 
        echo "Gagal menghapus data."; 
    } 
} else { 
    echo "ID tidak diberikan!"; 
} 
?>