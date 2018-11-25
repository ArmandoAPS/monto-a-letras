# RUBY: MONTO A LETRAS 
# Procedimiento para convertir un monto determinado 
# a letras menores al billón

#data
UNIDADES=["","uno","dos","tres","cuatro","cinco",
    "seis","siete","ocho","nueve","diez",
    "once","doce","trece","catorce","quince",
    "diesiseis","diesisiete","diesiocho","diesinueve",
    "veinte","treinta","cuarenta","cincuenta","sesenta",
    "setenta","ochenta","noventa","cien"]

CENTENAS = ["cien","ciento","doscientos","trescientos","cuatrocientos",
    "quinientos","seiscientos","setecientos","ochocientos",
    "novecientos","mil"]
DIEZ = 10
CIEN = 100
MIL = 1000
MILLON = 1000000
#end data

#function
def monto_a_letras(monto)
    if(monto <= CIEN)
        if(monto <= 20)
            return UNIDADES[monto]
        else
            d = (monto / DIEZ).to_i
            r = monto - d * DIEZ
            return UNIDADES[18 + r] + (r > 0 ? ("i" + UNIDADES[r]) : "")
        end
    elsif(monto <= MIL)
        d = (monto / CIEN).to_i
        r = monto - d * CIEN
        return CENTENAS[d] +  (r > 0 ? " " + monto_a_letras(r) : "")
    elsif(monto < MILLON)
        d = (monto / MIL).to_i
        r = monto - d * MIL
        return monto_a_letras(d) + " mil " +  (r > 0 ? " " + monto_a_letras(r) : "")
    else
        d = (monto / MILLON).to_i
        r = monto - d * MILLON
        if(d == 1)
            return "un millón " + (r > 0 ? monto_a_letras(r) : "")
        else
            return monto_a_letras(d) + " millones " + ( r > 0 ? monto_a_letras(r) : "")
        end
    end
end

#test
puts monto_a_letras(9999999)
    

