# PYTHON: MONTO A LETRAS 
# Procedimiento para convertir un monto determinado 
# a letras menores al billón

#data
UNIDADES=["","uno","dos","tres","cuatro","cinco",
    "seis","siete","ocho","nueve","diez",
    "once","doce","trece","catorce","quince",\
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
def monto_a_letras(monto):
    if(monto <= CIEN):
        if(monto <= DIEZ * 2):
            return UNIDADES[monto]
        else:
            d = monto // DIEZ
            r = monto - d * DIEZ
            return UNIDADES[18 + r] + (("i" + UNIDADES[r]) if r > 0 else "") 
    elif(monto <= MIL):
        d = monto // CIEN
        r = monto - d * CIEN
        return CENTENAS[d] +  (" " + monto_a_letras(r) if r > 0 else "")
    elif(monto < MILLON):
        d = monto // MIL
        r = monto - d * MIL
        return monto_a_letras(d) + " mil " +  (" " + monto_a_letras(r) if r > 0 else "")
    else:
        d = monto // MILLON
        r = monto - d * MILLON
        if(d == 1):
            return "un millón " + (monto_a_letras(r) if r > 0 else "")
        else:
            return monto_a_letras(d) + " millones " + (monto_a_letras(r) if r > 0 else "")
#end function


#test
print(monto_a_letras(9999999))
    

