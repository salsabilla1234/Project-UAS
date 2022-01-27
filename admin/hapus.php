<?php
require 'setting.php';
$id = $_GET['id'];
$query="DELETE FROM artikel WHERE id_berita=$id";
$sql= mysqli_query($koneksi,$query);
if($sql){
    echo "data berhasil di hapus";
    header('location:index.php');
}else{
    echo "data gagal terhapus";
}