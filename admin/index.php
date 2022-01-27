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
    <div class="container">
    <?php include 'navbar.php'; ?>
    
    </div>

    <div class="container">

        <h2 class="alert alert-info">DATA ARTIKEL :
        <?php echo $_SESSION ['nama']; ?>
        </h2>

        <a href="tambah.php" class="btn btn-info"> TAMBAH DATA </a>
 
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi Artikel</th>
                    <th>Penulis</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'setting.php';
                $query = "SELECT * FROM artikel";
                $sql = mysqli_query($koneksi, $query);
                $no = 1;
                while ($data = mysqli_fetch_object($sql)) {
                ?>
                <tr> 
                    <td> <?php echo $no++ ?> </td>
                    <td> <?php echo $data->judul; ?> </td>
                    <td> <?php echo $data->isi_artikel; ?> </td>
                    <td> <?php echo $data->penulis; ?> </td>
                    <td> <a href="gambar/<?php echo $data->Gambar; ?>"><?php echo $data->Gambar; ?></a></td>
                    <td>
                        <a href="edit.php?url-id=<?= $data->id_berita;?>">
                            <input type="submit" value="Edit" class="btn btn-warning" >
    </a> 
    <?php
    if($_SESSION['hak_akses']=='admin'){

    ?>
    <a href="hapus.php?id=<?= $data->id_berita;?>">
       <input type="submit" value="Hapus" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?')">
       </a>
       <?php
        }
        ?>
    </td>
                    
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="containet">
    <?php include 'footer.php'; ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</body>

</html>