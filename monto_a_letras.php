<?php 
// PHP: MONTO A LETRAS 
// Procedimiento para convertir un monto determinado 
// a letras menores al billón

function monto_a_letras($monto) {
    $UNIDADES = array("","uno","dos","tres","cuatro","cinco",
    "seis","siete","ocho","nueve","diez",
    "once","doce","trece","catorce","quince",
    "diesiseis","diesisiete","diesiocho","diesinueve",
    "veinte","treinta","cuarenta","cincuenta","sesenta",
    "setenta","ochenta","noventa","cien");

    $CENTENAS = array("cien","ciento","doscientos","trescientos","cuatrocientos",
    "quinientos","seiscientos","setecientos","ochocientos",
    "novecientos","mil");    
    
    $DIEZ = 10; 
    $CIEN = 100; 
    $MIL = 1000; 
    $MILLON = 1000000;
    
    if ($monto <= $CIEN) {
        if ($monto <= 20)
            return $UNIDADES[$monto];
        else {
            $d = floor($monto / $DIEZ);
            $r = $monto - $d * $DIEZ;
            return $UNIDADES[18 + $r] . ($r > 0 ? ("i" . $UNIDADES[$r]) : "");
        }
    }
    elseif ($monto <= $MIL) {
        $d = floor($monto / $CIEN);
        $r = $monto - $d * $CIEN;
        return $CENTENAS[$d] . " " . ($r > 0 ? monto_a_letras($r) : "");
    }
    elseif ($monto < $MILLON) {
        $d = floor($monto / $MIL);
        $r = $monto - $d * $MIL;
        return monto_a_letras($d) . " mil " . ($r > 0 ? monto_a_letras($r) : "");
    }
    else {
        $d = floor($monto / $MILLON);
        $r = $monto - $d * $MILLON;
        if($d == 1)
            return "un millón " . ($r > 0 ? monto_a_letras($r) : "");
        else
            return monto_a_letras($d) . " millones " . ($r > 0 ? monto_a_letras($r) : "");
    }
}
//test
echo monto_a_letras(999999);