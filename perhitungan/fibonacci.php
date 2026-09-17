<?php

function fibonacci($n)
{
    if ($n == 0) { // kondisi kalo == 0
        return 0;
    }

    if ($n == 1) { // kondisi kalo == 1
        return 1;
    }

    return fibonacci($n - 1) + fibonacci($n - 2); // kondisi kalo bukan 0 / 1
}

$hasil = []; // menyimpan hasil
$input = "";    // menyimpan input

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input = intval($_POST["angka"]); // merubah input jadi integer

    if ($input >= 0) { // memastikan input tidak kurang dari 0

        for ($i = 0; $i <= $input; $i++) {

            $hasil[] = fibonacci($i); // perhitungan

        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fibonacci - Perhitungan Algoritma</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    

    <div class="box">

        <h1>Fibonacci</h1>

        <p>
            Menampilkan deret Fibonacci menggunakan
            fungsi rekursif.
        </p>


        <form method="POST">

            <label for="angka">
                Masukkan angka
            </label>

            <input
                type="number"
                id="angka"
                name="angka"
                min="0"
                placeholder="Contoh: 5"
                value="<?= htmlspecialchars($input) ?>"
                required
            >

            <button type="submit">
                Hitung Fibonacci
            </button>

        </form>


        <?php if (!empty($hasil)): ?>

            <div class="result">

                <h3>Output</h3>

                <p class="output">
                    <?= implode(", ", $hasil) ?>
                </p>

            </div>

        <?php endif; ?>

    </div>

    <a class="kembali" href="index.php">← Kembali</a>

</div>

</body>

</html>