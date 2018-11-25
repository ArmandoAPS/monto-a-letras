// JAVASCRIPT: MONTO A LETRAS 
// Procedimiento para convertir un monto determinado 
// a letras menores al billón

//data
var UNIDADES=["","uno","dos","tres","cuatro","cinco",
    "seis","siete","ocho","nueve","diez",
    "once","doce","trece","catorce","quince",
    "diesiseis","diesisiete","diesiocho","diesinueve",
    "veinte","treinta","cuarenta","cincuenta","sesenta",
    "setenta","ochenta","noventa","cien"];

var CENTENAS = ["cien","ciento","doscientos","trescientos","cuatrocientos",
    "quinientos","seiscientos","setecientos","ochocientos",
    "novecientos","mil"];
	
var DIEZ = 10; var CIEN = 100; var MIL = 1000; var MILLON = 1000000;
//end data

//function
function monto_a_letras(monto) {
    if(monto <= CIEN) {
        if(monto <= DIEZ * 2)
            return UNIDADES[monto];
        else {
            d = Math.floor(monto / DIEZ);
            r = monto - d * DIEZ;
            return UNIDADES[18 + r] + (r > 0 ? ("i" + UNIDADES[r]) : "");
        }
    }
    else if(monto <= MIL) {
        d = Math.floor(monto / CIEN);
        r = monto - d * CIEN;
        return CENTENAS[d] + " " + (r > 0 ? monto_a_letras(r) : "");
    }
    else if(monto < MILLON) {
        d = Math.floor(monto / MIL)
        r = monto - d * MIL;
        return monto_a_letras(d) + " mil " + (r > 0 ? monto_a_letras(r) : "");
    }
    else {
        d = Math.floor(monto / MILLON);
        r = monto - d * MILLON;
        if(d == 1)
            return "un millón " + (r > 0 ? monto_a_letras(r) : "");
        else
            return monto_a_letras(d) + " millones " + ( r > 0 ? monto_a_letras(r) : "");
    }
}
//test
console.log(monto_a_letras(9999999));
