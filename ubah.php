<?php

require 'functions.php';
//koneksi ke DBMS
//$conn = mysqli_connect("localhost", "root", "", "anime");

//ambil data di URL
$id = $_GET["id"];
// var_dump($id);

//query data mahasiswa berdasarkan id
$kredit = query("SELECT * FROM data_kredit WHERE id = $id")[0];
// var_dump($anime["Nama Anime"]);

//cek apakah tombol submit sudah ditekan atau belom
if (isset($_POST["gass"])) {
    // var_dump($_POST);

    //cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'data.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'data.php';
        </script>
        ";
    }
    // if (mysqli_affected_rows($conn) > 0) {
    //     echo "berhasil";
    // } else {
    //     echo "gagal";
    //     echo "<br>";
    //     echo mysqli_error($conn);
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap-datepicker.min.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="bootstrap-validate.js"></script>
    <form action="" method="post"></form>
    <title>Simulasi Kredit Rumah</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">SIMULASI KREDIT RUMAH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Simulasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data.php">Data</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1 class="font-weight-bold text-center mt-3 mb-3">
                SIMULASI KREDIT RUMAH
            </h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $kredit['id']; ?>">
                <div class="form-group">
                    <label for="harga">Harga Rumah</label>
                    <input type="number" class="form-control" name="harga" min="100000000" placeholder="ex. Rp. 100.000.000" value="<?= $kredit['harga']; ?>">
                    <small class="form-text text-muted">Min. Rp.100Juta</small>
                </div>
                <div class="form-group">
                    <label for="bunga">Bunga Pinjaman</label>
                    <input type="number" class="form-control" name="bunga" min="5" value="<?= $kredit['harga']; ?>">
                    <small class="form-text text-muted">Min 5% max 10% / tahun</small>
                </div>
                <div class="form-group">
                    <label for="uangdp">Uang Muka (DP)</label>
                    <input type="number" class="form-control" name="uangdp" min="30" placeholder="Dalam bentuk persen (%)" value="<?= $kredit['uangdp']; ?>">
                    <small class="form-text tex  t-muted">Min 30% Max 100%</small>
                </div>
                <div class="form-group">
                    <label for="tenor">Jangka Waktu (Tenor)</label>
                    <input type="number" class="form-control" name="tenor" min="1" value="<?= $kredit['tenor']; ?>">
                    <small class="form-text text-muted">Min 1 tahun Max 10 tahun</small>
                </div>
                <div class="form-group">
                    <label for="margin">Perhitungan Margin</label>
                    <select class="form-control custom-select" id="perhitunganmargin" name="margin" value="<?= $kredit['margin']; ?>">
                        <option disabled selected>-- Pilih --</option>
                        <option value="Flat">Flat</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary" name="reset">Reset</button>
                    <button class="btn btn-lg btn-primary" name="gass">Ubah</button>
                </div>
                <footer>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>&copy;Copyright 2021 | <a href="#">by YusufBagus
                            </div>
                        </div>
                </footer>
        </div>
    </main>

</body>


</footer>

</html>