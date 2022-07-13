<?php
require 'functions.php';
$rows = query("SELECT * FROM data_kredit");

// if ($result == 0) { // = if(i($result)==1)
//     echo mysqli_error($conn);
// }

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
                        <a class="nav-link" href="input.php">Simulasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Data</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1 class="font-weight-bold text-center mt-3 mb-3">
                DATA SIMULASI KREDIT RUMAH
            </h1>
            <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Harga Rumah</th>
                        <th>Besar Bunga</th>
                        <th>Uang Muka</th>
                        <th>Jangka Waktu</th>
                        <th>Margin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['harga'] ?></td>
                            <td><?= $row['bunga'] ?></td>
                            <td><?= $row['uangdp'] ?></td>
                            <td><?= $row['tenor'] ?></td>
                            <td><?= $row['margin'] ?></td>
                            <td>
                                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin??');">Hapus</a>
                                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                                <a href="hasil.php?id=<?= $row["id"]; ?>">Hasil</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>


</footer>

</html>