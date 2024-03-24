<!DOCTYPE html>
< lang="en">
<>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles2.css" />
    <title>Proses Pemesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@100;300;400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/proses.css">
    
    <script>
        function validasiPembayaran() {
            var nominalPembayaran = document.getElementById('nominal_pembayaran').value;
            var totalBiaya = <?php echo $total_biaya; ?>;

            if (parseFloat(nominalPembayaran) !== totalBiaya) {
                alert('Nominal pembayaran tidak sesuai dengan total biaya. Silakan masukkan nominal yang sesuai.');
                return false; // Prevent form submission
            }

            // If the validation passes, you can proceed with form submission
            return true;
        }
    </script>
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">SOUND<span> SYSTEM</span> NFA</a>
        <div class="navbar-nav">
            <a href="../index.html">Home</a>
            <a href="../index.html">Tentang Kami</a>
        </div>
    </nav>
    <!-- Navbar end -->



    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari formulir
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $nohp= $_POST["nohp"];
            $imageInput= $_FILES["imageInput"];
            $tgl_pinjam = $_POST["tgl_pinjam"];
            $tgl_kembali = $_POST["tgl_kembali"];
            $sound = $_POST["sound"];

            // perhitungan
            $harga_per_hari = [
                "sound 8000watt" => 1500000,
                "sound 10.000watt" => 2000000,
                "sound 15.000watt" => 2500000
            ];
            if (array_key_exists($sound, $harga_per_hari)) {
                // Hitung selisih hari
                $tgl_pinjam_obj = new DateTime($tgl_pinjam);
                $tgl_kembali_obj = new DateTime($tgl_kembali);
                $selisih_hari = $tgl_pinjam_obj->diff($tgl_kembali_obj)->days;
                $total_biaya_per_hari = $harga_per_hari[$sound];
            
                $total_biaya = $selisih_hari * $total_biaya_per_hari;
            

                // Tampilkan hasil perhitungan
                echo "<div class='summary-container'>";
                echo "<h2>Konfirmasi Pemesanan</h2>";
                echo "<form action='./process_payment.php' method='post'>";
                echo "<table class='summary-table'>";
                echo "<tr><td>Nama</td><td>$nama</td></tr>";
                echo "<tr><td>Alamat</td><td>$alamat </td></tr>";
                echo "<tr><td>Nomor Telepon</td><td>$nohp</td></tr>";
                if ($imageInput && $imageInput["name"]) {
                    echo "<tr><td>Bukti Screenhoot</td><td>$imageInput[name]</td></tr>";
                } else {
                    echo "<tr><td>Bukti Screenhoot</td><td>Tidak ada file diunggah</td></tr>";
                }
                echo "<tr><td>Tanggal Peminjaman</td><td>$tgl_pinjam</td></tr>";
                echo "<tr><td>Tanggal Pengembalian</td><td>$tgl_kembali</td></tr>";
                echo "<tr><td>Sound System yang Dipilih</td><td>$sound</td></tr>";
            
                echo "<tr><td>Total Biaya</td><td>Rp" . number_format($total_biaya) . "</td></tr>";
                echo "</table>";

                // Formulir Pembayaran
                echo "<h2>Formulir Pembayaran</h2>";
                echo "<form action='./process_payment.php' method='post' onsubmit='return validasiPembayaran();'>";

                echo "<label for='bank'>Bank Yang Di Pilih</label>";
                echo"<select id='bank'>";
                echo"<option value='bca' name'bca'>BCA 17223309</option>";
                echo"<option value='bri' name'bri'>BRI 01211502215 </option>";
                echo"<option value='mandiri' name'mandiri'>MANDIRI 125125521525</option>";
                echo"</select>";

                echo "<label for='norek'>Nomor rekening:</label>";
                echo "<input type='number' id='norek' name='norek' required>";

                echo "<label for='an_nama'>Atas Nama:</label>";
                echo "<input type='nama' id='an_nama' name='an_nama' required>";

                echo "<label for='nominal_pembayaran'>Nominal Pembayaran:</label>";
                echo "<input type='number' id='nominal_pembayaran' placeholder='Masuakan Nominal Sesuai Dengan Total Biaya' name='nominal_pembayaran' required>";
                
                echo "<input type='hidden' name='total_biaya' value='$total_biaya'>";
                echo "<input type='hidden' name='nama' value='$nama'>";
                echo "<input type='hidden' name='alamat' value='$alamat'>";
                echo "<input type='hidden' name='nohp' value='$nohp'>";
                echo "<input type='hidden' name='tgl_pinjam' value='$tgl_pinjam'>";
                echo "<input type='hidden' name='tgl_kembali' value='$tgl_kembali'>";
                echo "<input type='hidden' name='sound' value='$sound'>";
                echo "<button type='submit' value='Bayar'> Bayar</button>";
                
            }
          

            header("Location: ../process_payment.php?nama=$nama&alamat=$alamat&nohp=$nohp&tgl_pinjam=$tgl_pinjam&tgl_kembali=$tgl_kembali&sound=$sound&total_biaya=$total_biaya&an_nama=$an_nama&rt=$rt&rw=$rw");
            exit();
        }
        ?>
    </div>
</body>
</html>