<?php
require 'functions.php';

//ambil data di URL
$id = $_GET["id"];
// var_dump($id);

//query data mahasiswa berdasarkan id
$kredit = query("SELECT * FROM data_kredit WHERE id = $id")[0];
// var_dump($kredit);
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
                        <a class="nav-link" href="data.php">Data</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1 class="font-weight-bold text-center mt-3 mb-3">
                HASIL SIMULASI KREDIT RUMAH
            </h1>
            <form action="" method="post">
                <?php
                // extract($_POST);
                // error_reporting(0);
                $harga = $kredit['harga'];
                $bunga = $kredit['bunga'];
                $uangdp = $kredit['uangdp'];
                $tenor = $kredit['tenor'];
                $margin = $kredit['margin'];
                ?>

                <?php
                // extract($_POST);
                function angsuran($plafon, $tenor, $bungaangsuran)
                {
                    $angsuranbulan = $plafon / $tenor + $bungaangsuran;
                    return $angsuranbulan;
                }
                $dp = $harga * $uangdp / 100;
                $plafon = $harga - $dp;
                $bungaangsuran = (($bunga / 100) / 12) * $plafon;
                $tenor = $tenor * 12;
                $tahun = $tenor / 12;
                $bungabulan = $bunga / 12;
                $angsuran = $plafon / $tenor;
                $angsuranbulan = angsuran($plafon, $tenor, $bungaangsuran);
                $pembayaranpertama = $dp + $angsuranbulan;
                $totalbunga = $bungaangsuran * $tenor;
                $totalangsuran = $plafon + $totalbunga;
                ?>
                <!--Tabel Pertama -->
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <th scope="col">Data Anda</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Harga Rumah</td>
                            <td><?php echo "Rp. " . number_format($harga) ?></td>
                        </tr>
                        <tr>
                            <td>Uang Muka (DP)</td>
                            <td><?php echo "Rp. " . number_format($dp) ?></td>
                        </tr>
                        <tr>
                            <td>Jangka Waktu (Tenor)</td>
                            <td><?php echo $tenor . " Bulan" ?></td>
                        </tr>
                        <tr>
                            <td>Bunga Pinjaman</td>
                            <td><?php echo $bunga . "% /tahun" ?></td>
                        </tr>
                        <tr>
                            <td>Perhitungan Margin</td>
                            <td><?php echo $margin; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <!--Tabel kedua -->
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <th scope="col">Plafon Pinjaman Anda</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Harga Rumah</td>
                            <td><?php echo "Rp. " . number_format($harga) ?></td>
                        </tr>
                        <tr>
                            <td>Uang Muka (DP)</td>
                            <td><?php echo "Rp. " . number_format($dp) ?></td>
                        </tr>
                        <tr>
                            <td>Plafon Pinjaman Anda</td>
                            <td><?php echo "Rp. " . number_format($plafon) ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <!--Tabel ketiga -->
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <th scope="col">Angsuran per Bulan</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Angsuran Pokok</td>
                            <td><?php echo "Rp. " . number_format($angsuran) ?></td>
                        </tr>
                        <tr>
                            <td>Angsuran Bunga</td>
                            <td><?php echo "Rp. " . number_format($bungaangsuran) ?></td>
                        </tr>
                        <tr>
                            <td>Total Angsuran per Bulan</td>
                            <td><?php echo "Rp. " . number_format($angsuranbulan) ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <!--Tabel keempat -->
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <th scope="col">Pembayaran Pertama</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Uang Muka (DP)</td>
                            <td><?php echo "Rp. " . number_format($dp) ?></td>
                        </tr>
                        <tr>
                            <td>Angsuran Pertama</td>
                            <td><?php echo "Rp. " . number_format($angsuranbulan) ?></td>
                        </tr>
                        <tr>
                            <td>Total Pembayaran Pertama</td>
                            <td><?php echo "Rp. " . number_format($pembayaranpertama) ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <!--Tabel kelima -->
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <th scope="col">Bulan</th>
                        <th scope="col">Bunga</th>
                        <th scope="col">Pokok</th>
                        <th scope="col">Total</th>
                        <th scope="col">Sisa</th>
                    </thead>
                    <h4>Tabel Angsuran</h4>
                    <tbody>
                        <?php
                        $sisa[0] = $totalangsuran;
                        for ($i = 1; $i <= $tenor; $i++) {
                            $sisa[$i] = $sisa[$i - 1] - $angsuranbulan;
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td> Rp " . number_format($bungaangsuran) . "</td>";
                            echo "<td> Rp " . number_format($angsuran) . "</td>";
                            echo "<td> Rp " . number_format(angsuran($plafon, $tenor, $bungaangsuran)) . "</td>";
                            echo "<td> Rp " . number_format($sisa[$i]) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Total </td>
                            <td><?php echo "Rp " . number_format($totalbunga); ?></td>
                            <td><?php echo "Rp " . number_format($plafon); ?></td>
                            <td><?php echo "Rp " . number_format($totalangsuran); ?></td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </form>
        </div>
    </main>
</body>

</html>