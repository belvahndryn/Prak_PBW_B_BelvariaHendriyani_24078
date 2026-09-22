<?php

function statuskelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'sangat memuaskan';
    if ($ipk >= 3.00) return 'memuaskan';
    return 'perlu peningkatan';
}

$mahasiswa = [
    'npm' => '4524210078',
    'nama' => 'Belvaria Hendriyani',
    'prodi' => 'Teknik Informatika',
    'semester' => '5',
    'ipk' => '4.00',

    // MODIFIKASI 1: Menambahkan data baru
    'email' => 'belvaria@gmail.com',
    'hobi' => 'Nyoba nyoba hobi',
];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Biodata Mahasiswa</title>

    <!-- MODIFIKASI 2: Menambahkan styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 40px;
        }

        .biodata {
            width: 500px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
        }

        ul {
            padding: 0;
            list-style: none;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .predikat {
            margin-top: 20px;
            padding: 12px;
            background-color: #f5f5f5;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="biodata">

        <h1>Biodata Mahasiswa</h1>

        <ul>
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <li>
                    <?= ucfirst($kunci) ?>:
                    <?= htmlspecialchars((string)$nilai) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="predikat">
            Predikat:
            <?= statuskelulusan((float)$mahasiswa['ipk']) ?>
        </p>

    </div>

</body>

</html>