<?php
function konversi($nilai, $dari, $ke) {
    // ubah ke celcius
    switch($dari) {
        case "fahrenheit": $celcius = ($nilai - 32) * 5/9; break;
        case "reamur": $celcius = $nilai * 5/4; break;
        case "kelvin": $celcius = $nilai - 273.15; break;
        default: $celcius = $nilai;
    }

    // ubah dari celcius ke tujuan
    switch($ke) {
        case "fahrenheit": return ($celcius * 9/5) + 32;
        case "reamur": return $celcius * 4/5;
        case "kelvin": return $celcius + 273.15;
        default: return $celcius;
    }
}

$hasil = konversi($_POST['suhu'], $_POST['dari'], $_POST['ke']);
echo "Hasil: " . $hasil;
?>