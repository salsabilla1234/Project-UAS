<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
    <h3 class="alert alert-info"> Edit Data Artikel</h3>
    <?php
    require 'setting.php';
        //menampilan data dalam table
        if(isset($_GET['url-id'])){
            $input_id = $_GET['url-id'];
            $query = "SELECT * FROM artikel WHERE id_berita ='$input_id'";
            $result = mysqli_query($koneksi,$query);
            $data = mysqli_fetch_object($result);
        }
        //simpan data yang telah dirubah dalam table
       if(isset($_POST['simpan'])){
                
                 $txtjudul = $_POST['txtjudul'];
                 $txtisi = $_POST['txtisi'];
                 $txtpenulis = $_POST['txtpenulis'];
                
        //update syntax dalam mysql
                 $sql = "UPDATE artikel SET 
                         judul='$txtjudul', isi_artikel='$txtisi', penulis='$txtpenulis'
                         WHERE id_berita = $input_id";
                 $result = mysqli_query($koneksi,$sql);
        //perulangan jika dia berhasil maka ke index dan data diperbarui
                if($result)  {
                  header('location:index.php');
      //jika salah data tidak berhasil diperbarui dan menghasilkan error
                }else {
                  echo 'Query Error'. mysqli_error($koneksi);
                }
                }
              ?>
<form action="#" method="Post">
<div class="mb-3">
    <label for="">JUDUL</label>
    <input type="text" name="txtjudul" id ="txtjudul" class="form-control" value="<?=$data->judul;?>">
</div>

<div class="mb-3">
    <label for="">ISI ARTIKEL</label>
    <textarea name="txtisi"  id ="txtisi" class="form-control" cols="30" rows="5" ><?=$data->isi_artikel;?></textarea>
    
</div>
<div class="mb-3">
    <label for="">PENULIS</label>
    <input type="text"  name="txtpenulis" id= "txtpenulis" class="form-control" value="<?=$data->penulis;?>" >
</div>


<input type="submit" name="simpan" value="Simpan Perubahan Data" class="btn btn-primary">
<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</body>
</html>