<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/proses_payment.css">
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari formulir pembayaran
            $nominal_pembayaran = isset($_POST["nominal_pembayaran"]) ? $_POST["nominal_pembayaran"] : 0;
            $an_nama = isset($_POST["an_nama"]) ? $_POST["an_nama"] : '';
            $total_biaya = isset($_POST["total_biaya"]) ? $_POST["total_biaya"] : 0;
            $nama = isset($_POST["nama"]) ? $_POST["nama"] : '';
            $alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : '';
            $tgl_pinjam = isset($_POST["tgl_pinjam"]) ? $_POST["tgl_pinjam"] : '';
            $tgl_kembali = isset($_POST["tgl_kembali"]) ? $_POST["tgl_kembali"] : '';
            $sound = isset($_POST["sound"]) ? $_POST["sound"] : '';

            if ($nominal_pembayaran == $total_biaya) {
                echo "<h2>Pembayaran Berhasil!</h2>";
                echo "<p>Total dibayarkan: Rp" . number_format($total_biaya) . "</p>";
                echo "<p>Atas Nama : . $an_nama . </p>";
                
                echo "<h2>Struk Pemesanan</h2>";
                echo "<table>";
                echo "<tr><td>Nama</td><td>" . $nama . "</td></tr>";
                echo "<tr><td>Alamat</td><td> ".$alamat ."</td></tr>";
                echo "<tr><td>Nomor Telepon</td><td>" . $nohp . "</td></tr>";
                echo "<tr><td>Tanggal Peminjaman</td><td>" . $tgl_pinjam . "</td></tr>";
                echo "<tr><td>Tanggal Pengembalian</td><td>" . $tgl_kembali . "</td></tr>";
                echo "<tr><td>Sound System yang Dipilih</td><td>" . $sound . "</td></tr>";
                echo "<tr><td>Total Biaya</td><td>Rp" . number_format($total_biaya) . "</td></tr>";
                echo "</table>";
                echo"<p> Kami akan menghubungi anda dan mengantar ke alamat yang di tuju, Terimaksih Telah Meminjam </p>";
                echo "<h1>Screnshoot Struk Ini Untuk Bukti Pembayaran</h1>";
                echo"<form  action='../index.html' method='post'>";
                echo"<button type='submit'>Kembali Ke home</button>";
                echo"</form>";
               
                
                        }
        }

        ?>
    </div>
</body>

</html>