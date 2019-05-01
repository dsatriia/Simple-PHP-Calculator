<?php
if (!isset($_GET["inputan"])) {
    header('Location:calculator.php');
}
$inputan = $_GET["inputan"];


function hitung($i) {
    $inputan_fix = str_replace("/","---",$i);
    $inputan_fix = str_replace(":","/",$inputan_fix);

    $inputan_fix = str_replace("*","---",$inputan_fix);
    $inputan_fix = str_replace("x","*",$inputan_fix);

    $inputan_fix = str_replace("**","---",$inputan_fix);
    $inputan_fix = str_replace("^","**",$inputan_fix);

    try {
        $hasil = eval('return '.$inputan_fix.';');
        return $hasil;
    } catch (ParseError $e) {
        return "SALAH";
    }
}

function baca($angka) {
    $nomina = array("","satu","dua","tiga","empat","lima","enam",
        "tujuh","delapan","sembilan","sepuluh","sebelas");

    // var_dump($$nomina);
    if($angka<12)
        {
          return $nomina[floor($angka)];
        }
        
        if($angka>=12 && $angka <=19)
        {
            return $nomina[floor($angka%10)] ." belas ";
        }
        
        if($angka>=20 && $angka <=99)
        {
            return $nomina[floor($angka/10)] ." puluh ".$nomina[floor($angka%10)];
        }
        
        if($angka>=100 && $angka <=199)
        {
            return "seratus ". baca($angka%100);
        }
        
        if($angka>=200 && $angka <=999)
        {
            return $nomina[floor($angka/100)]." ratus ".baca($angka%100);
        }
        
        if($angka>=1000 && $angka <=1999)
        {
            return "seribu ". baca($angka%1000);
        }
        
        if($angka >= 2000 && $angka <=999999)
        {
            return baca(floor($angka/1000))." ribu ". baca($angka%1000);
        }
        
        if($angka >= 1000000 && $angka <=999999999)
        {
            return baca(floor($angka/1000000))." juta ". baca($angka%1000000);
        }
        
        if($angka >= 1000000000 && $angka <=2147483647)
        {
            return baca(floor($angka/1000000000))." milyar ". baca($angka%1000000000);
        }
        
        return "";
}

echo "Hasilnya : ";
echo "<br>";
echo hitung($inputan);
echo "<br>";

echo "Dibaca : ";
echo "<br>";
echo baca(hitung($inputan));
echo "<br>";

// echo PHP_INT_MAX;

echo "<a href='calculator.php'>Calculator";






?>
