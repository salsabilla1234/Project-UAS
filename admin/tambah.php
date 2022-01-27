<?php
session_start();
if (!isset($_SESSION['login'])){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NEWS</title>
    <link rel="stylesheet" href = "..">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2 class="alert alert-info"> TAMBAH DATA ARTIKEL </h2>
        <?php
                require 'setting.php';
                if (isset($_POST['simpan'])) {
                    $txtjudul = $_POST['txtjudul'];
                    $txtisi = $_POST['txtisi'];
                    $txtpenulis = $_POST['txtpenulis'];
                    $txtGambar = $_POST['Gambar'];
                    $sql = "INSERT INTO artikel VALUES (NULL, '$txtjudul', '$txtisi', '$txtpenulis', '$txtGambar')";
                    $query = mysqli_query($koneksi, $sql);
                    if ($query){
                        header('location: index.php');
                    }else {
                        echo 'Query Error : ' . mysqli_error($koneksi);
                    }
                }
    
                ?>
        <form action="#" method="POST"> 
        <div class="mb-3">
            <label>JUDUL</label>
            <input type="text" name="txtjudul" id="txtjudul" class="form-control">
        </div>

        <div class="mb-3">
            <label>ISI ARTIKEL</label>
            <textarea name="txtisi" id="txtisi" class="form-control" cols="30" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label>PENULIS</label>
            <input type="text" name="txtpenulis" id="txtpenulis" class="form-control">
        </div>
        <div class="mb-3">
            <label class="custom-file-input" id="foto" for="exampleInputFile">GAMBAR</label>
            <input type="file" class="custom-file-input" id ="Gambar"  name="Gambar" >
            
        </div>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        <a href="index.php" class="btn btn-secondary"> HOME </a>
    </form>
    </div>
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</body>

</html>