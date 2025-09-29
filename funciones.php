<?php

function coefPascal($fila, $col)
{
    if ($col == 0 || $col == $fila) {
        return 1;
    }

    $izq = coefPascal($fila - 1, $col - 1);
    $der = coefPascal($fila - 1, $col);

    $suma = $izq + $der;
    return $suma;
}

function armaTermino($coef, $expA, $expB)
{
    $parte = '';

    if ($coef != 1) {
        $cstr = (string) $coef;
        $parte .= $cstr;
    }

    if ($expA > 0) {
        $parte .= 'a';
        if ($expA > 1) {
            $parte .= '^' . $expA;
        }
    }

    if ($expB > 0) {
        $parte .= 'b';
        if ($expB > 1) {
            $parte .= '^' . $expB;
        }
    }

    if ($parte === '') {
        $parte = '1';
    }

    return $parte;
}

function generarExpansion($n)
{
    $resultado = array();
    $k = 0;
    $tope = $n;
    while ($k <= $tope) {
        $coef = coefPascal($n, $k);

        $expA = $n - $k;
        $expB = $k;

        $term = armaTermino($coef, $expA, $expB);

        $resultado[] = $term;
        $k = $k + 1;
    }

    return $resultado;
}

function formateaSalida($n, $listaTerminos)
{
    $salida = "(a + b)^" . $n . " = ";
    $cadena = '';

    $i = 0;
    $len = count($listaTerminos);
    while ($i < $len) {
        if ($i > 0) {
            $cadena .= ' + ';
        }
        $cadena .= $listaTerminos[$i];
        $i++;
    }

    $salida .= $cadena;
    return $salida;
}
