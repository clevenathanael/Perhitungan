<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Umur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Perhitungan Umur</h1>

    <form method="post">

        <label>Tanggal Lahir (MM-DD-YYYY)</label>

        <input
            type="text"
            name="tanggal_lahir"
            placeholder="Contoh: 05-20-2000"
            required
        >

        <button type="submit">Hitung</button>

    </form>

    <?php

    if (isset($_POST['tanggal_lahir'])) {

        $input = trim($_POST['tanggal_lahir']);

        // Mengubah input menjadi format tanggal
        $tanggal_lahir = DateTime::createFromFormat('m-d-Y', $input);

        // Mengecek apakah format tanggal benar
        if (
            $tanggal_lahir === false ||
            $tanggal_lahir->format('m-d-Y') !== $input
        ) {
            // output kalau input tidak sesuai dengan format
            echo "<div class='hasil'>";
            echo "Format tanggal tidak valid.";
            echo "<br>Gunakan format MM-DD-YYYY.";
            echo "</div>";

        } else { // output kalau input sesuai dengan format

            // Tanggal hari ini
            $tanggal_sekarang = new DateTime();

            // Menghitung umur
            $umur = $tanggal_lahir->diff($tanggal_sekarang); // diff untuk menghitung selisih dari tanggal lahir ke tanggal sekarang

            /*
             * Menghitung jumlah tahun kabisat
             * yang terlewati.
             */

            $tahun_awal = (int) $tanggal_lahir->format('Y');
            $tahun_akhir = (int) $tanggal_sekarang->format('Y');

            $jumlah_kabisat = 0;

            for ($tahun = $tahun_awal; $tahun <= $tahun_akhir; $tahun++) {

                // Cek tahun kabisat
                if (
                    $tahun % 400 == 0 ||
                    ($tahun % 4 == 0 && $tahun % 100 != 0) 
                ) {
                    $jumlah_kabisat++;
                    echo $tahun;
                }
            }

            echo "<div class='hasil'>";

            echo "<h3>Hasil Perhitungan</h3>";

            echo $umur->y . " tahun, ";
            echo $umur->m . " bulan, ";
            echo $umur->d . " hari, ";
            echo $jumlah_kabisat . " tahun kabisat";
            

            echo "</div>";
        }
    }

    ?>

    <a class="kembali" href="index.php">← Kembali</a>

</div>

</body>
</html>