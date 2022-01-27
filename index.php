<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Berita</title>


</head>

<body>
    <div class="container">
        <?php include 'navbar_index.php' ?>
        <div class="row mt-3">
            <?php 
            require 'admin/setting.php';
            $query = "SELECT * FROM artikel";
            $sql = mysqli_query($koneksi, $query);
            while($data = mysqli_fetch_object($sql)){

            
            ?>
            <div class="col-sm-3">
                <div class="card">
                    <img src="admin/Gambar/<?= $data->Gambar; ?>" style="height:25vh;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data->judul; ?></h5>
                        <p class="card-text"><?= $data->isi_artikel; ?></p>

                    </div>
                </div>
            </div>

            <?php 
            }
            ?>
           
        </div>

        <?php include 'admin/footer.php' ?>
    </div>

</body>

</html>