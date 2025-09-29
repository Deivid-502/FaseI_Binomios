<?php
require_once __DIR__ . '/funciones.php';

echo "binomio (a + b)^n\n";

while (true) {

    while (true) {
        echo "Ingresa la potencia n (entero >= 0) o 'q' para salir: ";
        $raw = trim(fgets(STDIN));

        if ($raw === 'q' || $raw === 'Q') {
            echo "Saliendo...\n";
            exit;
        }

        if ($raw === '') {
            echo "El valor ingresado no es valido. Intenta otravez.\n";
            continue;
        }

        $maybeInt = filter_var($raw, FILTER_VALIDATE_INT);
        if ($maybeInt === false || $maybeInt < 0) {
            echo "Por favor escribe un numero entero mayor o igual a 0.\n";
            continue;
        }

        $n = intval($maybeInt);
        break;
    }

    $lista = generarExpansion($n);

    if (count($lista) > 0) {
        $nums = [];
        for ($i = 0; $i <= $n; $i++) {
            $nums[] = coefPascal($n, $i);
        }
        echo "Coeficientes para n = $n\n";
    }

    $salida = formateaSalida($n, $lista);
    echo $salida . PHP_EOL;

    echo "Operado.\n";

    echo "¿Calcular otra vez? (s/n): ";
    $seguir = trim(fgets(STDIN));
    $seguir = strtolower($seguir);

    if ($seguir === 's' || $seguir === 'y') {
        echo "\n";
        continue;
    } else {
        echo "Hasta luego.\n";
        break;
    }
}
