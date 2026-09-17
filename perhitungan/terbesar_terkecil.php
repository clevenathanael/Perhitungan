<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angka Terbesar dan Terkecil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Angka Terbesar dan Terkecil</h1>

    <form method="post">

        <label>Input 1 : List Integer</label>

        <input
            type="text"
            name="angka"
            placeholder="Contoh: 1,3,2,9,5"
            required
        >

        <label>Input 2 : Pilihan</label>

        <select name="pilihan" required>
            <option value="">-- Pilih --</option>
            <option value="A">A - Angka Terbesar</option>
            <option value="B">B - Angka Terkecil</option>
        </select>

        <button type="submit">Proses</button>

    </form>

    <?php

    if (isset($_POST['angka']) && isset($_POST['pilihan'])) {

        // Mengambil list integer
        $input = $_POST['angka'];

        // Memisahkan angka berdasarkan koma
        $angka = explode(',', $input);

        // Mengubah setiap input menjadi integer
        for ($i = 0; $i < count($angka); $i++) {
            $angka[$i] = (int) trim($angka[$i]);
        }

        // Nilai awal
        $hasil = $angka[0];

        // Pilihan user
        $pilihan = strtoupper($_POST['pilihan']);

        // Mencari angka terbesar
        if ($pilihan == 'A') {

            for ($i = 1; $i < count($angka); $i++) { // mengecek dari yang paling pertama

                if ($angka[$i] > $hasil) {
                    $hasil = $angka[$i]; // jika lebih besar maka angka menjadi hasil
                }
            }

            echo "<div class='hasil'>";
            echo "<h3>Hasil:</h3>";
            echo "Angka terbesar: <strong>$hasil</strong>";
            echo "</div>";

        }

        // Mencari angka terkecil
        elseif ($pilihan == 'B') {

            for ($i = 1; $i < count($angka); $i++) {

                if ($angka[$i] < $hasil) {
                    $hasil = $angka[$i];
                }
            }

            echo "<div class='hasil'>";
            echo "<h3>Hasil:</h3>";
            echo "Angka terkecil: <strong>$hasil</strong>";
            echo "</div>";

        }

        // Jika pilihan tidak sesuai
        else {

            echo "<div class='hasil'>";
            echo "Pilihan tidak valid. Gunakan A atau B.";
            echo "</div>";

        }
    }

    ?>

    <a class="kembali" href="index.php">← Kembali</a>

</div>

</body>
</html>