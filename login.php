<?php
session_start();
require 'admin/setting.php';
if (isset($_POST ['login'])){
    $username = $_POST ['txtusername'];
    $password = $_POST ['txtpassword'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and password='$password'");

    if (mysqli_num_rows($query) === 1){
        $data = mysqli_fetch_object($query);
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data->nama;
        $_SESSION['hak_akses'] = $data->hak_akses;

        header('location: admin/index.php');
    }
    echo  $error = 'Username atau Password Salah';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Login Form</title>
</head>
<body>
<div class="container">
<div class="row mt-3">
    <div class="col-4">
        <div class="card card-body bg-primary">
            <h3>Login Form</h3>
            <Form action =""method="POST">
                <input type="text-white" name="txtusername" class="form-control mb-3" placeholder="Masukan Username">
                <input type="password" name="txtpassword" class="form-control mb-3" placeholder="Masukan Password">
                <input type="submit" value="login" name="login" class="btn btn-btn bg-light">

            </form>

        </div>

    </div>

</div>

</div>
    
</body>
</html>