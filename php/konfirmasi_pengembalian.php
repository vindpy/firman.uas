<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles2.css" />
    <title>Konfirmasi Pengembalian</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@100;300;400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/konfirmasi.css">

</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">SOUND<span> SYSTEM</span> NFA</a>
        <div class="navbar-nav">
            <a href="../index.html">Home</a>
            <a href="../index.html">Tentang Kami</a>
            <a href="#pengembalian">Pengembailan</a>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="container">
        <!-- Output Konfirmasi Pengembalian start -->
        <div id="confirmation" class="pengemballain">
            <h2>Konfirmasi Pengembalian</h2>

            <?php
            // Retrieve data from the form submission
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $nohp = $_POST["nohp"];
            $tgl_kembali = $_POST["tgl_kembali"];
            $imageInput = $_FILES["imageInput"];
            ?>
            <?php
            // Display confirmation details in a table with gray text
            echo "<p>Terima kasih, $nama, telah melakukan pengembalian.</p>";
            echo "<p>Detail Pengembalia n</p>";
            echo "<table>";
            echo "<tr><td>Nama</td><td>$nama</td></tr>";
            echo "<tr><td>Alamat</td><td>$alamat</td></tr>";
            echo "<tr><td>Nomor Telepon</td><td>$nohp</td></tr>";
            echo "<tr><td> Tanggal Pengembalian </td><td>$tgl_kembali</td></tr>";
            if ($imageInput && $imageInput["name"]) {
                echo "<tr><td>Bukti Screenhoot</td><td>$imageInput[name]</td></tr>";
            } else {
                echo "<tr><td>Bukti Screenhoot</td><td>Tidak ada file diunggah</td></tr>";
            }
            echo "</table>";
            // ...
            ?>
        </div> 
    </div>
</body>

</html>