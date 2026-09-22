<?php
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;

        case '-':
            $hasil = $a - $b;
            break;

        case '*':
            $hasil = $a * $b;
            break;

        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;

        // MODIFIKASI 1: Menambahkan operasi pangkat
        case '^':
            $hasil = $a ** $b;
            break;

        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Modifikasi</title>

    <!-- MODIFIKASI 2: Styling tampilan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .kalkulator {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        input, select, button {
            padding: 10px;
            margin: 5px;
        }

        button {
            cursor: pointer;
        }

        .hasil {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="kalkulator">

    <h1>Kalkulator Sederhana</h1>

    <form method="post">

        <input
            type="number"
            step="any"
            name="a"
            placeholder="Angka pertama"
            required
        >

        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">^</option>
        </select>

        <input
            type="number"
            step="any"
            name="b"
            placeholder="Angka kedua"
            required
        >

        <br>

        <button type="submit">Hitung</button>

    </form>

    <?php if ($pesan): ?>

        <p class="hasil">
            <?= htmlspecialchars($pesan) ?>
        </p>

    <?php elseif ($hasil !== null): ?>

        <p class="hasil">
            Hasil:
            <?= htmlspecialchars((string)$a) ?>
            <?= htmlspecialchars($operator) ?>
            <?= htmlspecialchars((string)$b) ?>
            =
            <?= htmlspecialchars((string)$hasil) ?>
        </p>

    <?php endif; ?>

</div>

</body>
</html>