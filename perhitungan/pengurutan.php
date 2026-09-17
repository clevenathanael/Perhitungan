<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengurutan Angka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Pengurutan Angka</h1>

    <form method="post">

        <label>Masukkan angka</label>

        <input
            type="text"
            name="angka"
            placeholder="Contoh: 1,3,2,9,5"
            required
        >

        <button type="submit">Proses</button>

    </form>

    <?php

    if (isset($_POST['angka'])) {

        // ambil input user
        $input = $_POST['angka'];

        // Memisahkan angka berdasarkan koma
        $angka = explode(',', $input);

        // Mengubah setiap data menjadi angka
        for ($i = 0; $i < count($angka); $i++) { // perulangan untuk mengurutkan , $i sebagai variabel count nya dalam perulangan for
            $angka[$i] = (int) trim($angka[$i]); // (int) untuk mengubah data menjadi int
        }

        // Proses pengurutan manual
        for ($i = 0; $i < count($angka) - 1; $i++) { // Perulangan pertama untuk menentukan posisi angka


            for ($j = $i + 1; $j < count($angka); $j++) { // Perulangan kedua untuk membandingkan angka 
                                                        // dengan angka setelah posisi $i

                // menukar posisi sesuai dengan angka nya
                if ($angka[$i] < $angka[$j]) {  

                    // Tukar nilai
                    $temp = $angka[$i];
                    $angka[$i] = $angka[$j];
                    $angka[$j] = $temp;
                }   
            }
        }

        echo "<div class='hasil'>"; 
        echo "<h3>Hasil Pengurutan:</h3>";

        echo implode(", ", $angka);

        echo "</div>";
    }

    ?>

    <a class="kembali" href="index.php">← Kembali</a>

</div>

</body>
</html>