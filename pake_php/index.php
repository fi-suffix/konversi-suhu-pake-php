<!-- <form method="POST" action="konversi.php">
  <input type="number" name="suhu" required placeholder="Masukkan suhu">
  <select name="dari">
    <option value="celcius">Celcius</option>
    <option value="fahrenheit">Fahrenheit</option>
    <option value="reamur">Reamur</option>
    <option value="kelvin">Kelvin</option>
  </select>
  <select name="ke">
    <option value="celcius">Celcius</option>
    <option value="fahrenheit">Fahrenheit</option>
    <option value="reamur">Reamur</option>
    <option value="kelvin">Kelvin</option>
  </select>
  <button type="submit">Konversi</button>
</form>
 -->
 <?php
$hasil = '';
$nilai = '';
$dari = '';
$ke = '';

function konversi($nilai, $dari, $ke) {
    // Ubah ke celcius
    switch($dari) {
        case "fahrenheit": $celcius = ($nilai - 32) * 5/9; break;
        case "reamur": $celcius = $nilai * 5/4; break;
        case "kelvin": $celcius = $nilai - 273.15; break;
        default: $celcius = $nilai;
    }

    // Ubah ke satuan tujuan
    switch($ke) {
        case "fahrenheit": return ($celcius * 9/5) + 32;
        case "reamur": return $celcius * 4/5;
        case "kelvin": return $celcius + 273.15;
        default: return $celcius;
    }
}

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nilai = $_POST['suhu'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];
    $hasil = konversi($nilai, $dari, $ke);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu PHP</title>
</head>
<body>
    <form method="POST" action="">
        <input type="number" name="suhu" required placeholder="Masukkan suhu" value="<?= htmlspecialchars($nilai) ?>">
        
        <select name="dari">
            <option value="celcius" <?= ($dari == 'celcius') ? 'selected' : '' ?>>Celcius</option>
            <option value="fahrenheit" <?= ($dari == 'fahrenheit') ? 'selected' : '' ?>>Fahrenheit</option>
            <option value="reamur" <?= ($dari == 'reamur') ? 'selected' : '' ?>>Reamur</option>
            <option value="kelvin" <?= ($dari == 'kelvin') ? 'selected' : '' ?>>Kelvin</option>
        </select>

        <select name="ke">
            <option value="celcius" <?= ($ke == 'celcius') ? 'selected' : '' ?>>Celcius</option>
            <option value="fahrenheit" <?= ($ke == 'fahrenheit') ? 'selected' : '' ?>>Fahrenheit</option>
            <option value="reamur" <?= ($ke == 'reamur') ? 'selected' : '' ?>>Reamur</option>
            <option value="kelvin" <?= ($ke == 'kelvin') ? 'selected' : '' ?>>Kelvin</option>
        </select>

        <button type="submit">Konversi</button>
    </form>

    <?php if ($hasil !== ''): ?>
        <p>Hasil: <?= round($hasil, 2) ?> <?= ucfirst($ke) ?></p>
    <?php endif; ?>
</body>
</html>