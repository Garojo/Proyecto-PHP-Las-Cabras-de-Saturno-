<?php
// ===============================
//  PROYECTO: LAS CABRAS DE SATURNO
// ===============================
//
// Contexto: La colonia Capra Majoris, en los anillos de Saturno,
// ha sido impactada por bolas de queso ardiente procedentes del
// cinturón de Meteorquesos. Este programa ayudará a los técnicos
// a analizar los daños y calcular las pérdidas (y ganancias).
//
// Simbología del mapa ($capraMajoris):
// "0" -> terreno rocoso
// "~" -> atmósfera de metano
// "C" -> zona habitada (corrales de cabras)
//
// Los impactos se almacenan en el array $impacts
// como coordenadas [fila, columna].
//
// =========================================
// MAPA ORIGINAL DE CAPRA MAJORIS
// =========================================

$capraMajoris = [
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', 'C', 'C', 'C', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '0', '0', '0', 'C', '0', 'C', 'C', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~'],
    ['~', '~', '~', '~', '~', '0', '0', 'C', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', 'C', 'C', '0', '0', 'C', '0', '0', '0', '~', '~', '~'],
    ['~', '~', '~', '~', '0', 'C', 'C', '0', '0', 'C', '0', '0', '0', 'C', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', '0', '0', '0', 'C', '0', 'C', '0', '0', '0', '~'],
    ['~', '~', '~', '0', 'C', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '0', '0', '0', 'C', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '0', '0', '0', '0', 'C', '0', '0', '0', '0', 'C', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '0', '0', '0', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '0', '0', '0', '0', '0', 'C', '0', '0', '0', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~'],
    ['~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~', '~']
];

// Coordenadas [fila, columna] de los impactos de queso
$impacts = [
    [20, 4],
    [2, 13],
    [13, 12],
    [3, 17],
    [2, 13],
    [5, 19],
    [6, 18],
    [5, 2],
    [20, 13],
    [9, 7],
    [5, 9],
    [15, 16],
    [16, 13],
    [16, 9],
    [16, 0],
    [3, 19],
    [19, 8],
    [1, 16],
    [18, 4],
    [21, 23],
    [7, 17],
    [22, 15],
    [21, 6],
    [14, 8],
    [12, 23],
    [7, 7],
    [22, 4],
    [3, 21],
    [2, 3],
    [8, 11],
    [0, 4],
    [7, 21],
    [11, 4],
    [7, 15],
    [6, 17],
    [5, 19],
    [4, 19],
    [4, 7],
    [23, 21],
    [15, 20],
    [2, 9],
    [21, 2],
    [1, 13],
    [7, 10],
    [21, 5],
    [13, 17],
    [2, 14],
    [11, 14],
    [22, 17],
    [18, 22],
    [2, 23],
    [3, 1],
    [18, 6],
    [17, 12],
    [18, 18],
    [20, 2],
    [3, 14],
    [11, 21],
    [6, 5],
    [6, 2],
    [12, 23],
    [18, 18],
    [21, 6],
    [10, 12],
    [5, 4],
    [16, 19],
    [8, 10],
    [12, 21],
    [15, 1],
    [20, 14],
    [3, 20],
    [6, 19],
    [20, 13],
    [15, 4],
    [10, 2],
    [5, 16],
    [20, 1],
    [12, 13],
    [11, 5],
    [12, 14],
    [8, 3],
    [6, 8],
    [19, 7],
    [16, 9],
    [13, 20],
    [3, 5],
    [1, 0],
    [20, 14],
    [12, 21],
    [12, 16],
    [15, 7],
    [9, 1],
    [1, 18],
    [20, 6],
    [8, 6],
    [22, 1],
    [10, 22],
    [19, 19],
    [7, 16],
    [8, 8]
];


// =========================================
// ESCRIBE AQUÍ LA DEFINICIÓN DE LAS FUNCIONES
// =========================================

// (1) Función mostrar mapa
function mostrarMapa($mapa) {
    foreach ($mapa as $fila) {
        echo implode('', $fila) . "<br>";
    }
}

// (2) Función zonas afectadas
function zonasAfectadas($mapaOriginal, $impactos) {
    $mapaAfectado = $mapaOriginal;
    foreach ($impactos as $impacto) {
        $fila = $impacto[0];
        $columna = $impacto[1];
        if ($mapaAfectado[$fila][$columna] === 'C') {
            $mapaAfectado[$fila][$columna] = 'Q';
        }
    }
    return $mapaAfectado;
}

// (3) Población afectada y consumo de desodorante espacial
function calcularCabrasYDesodorante($mapaAfectado) {
    $cabrasAfectadas = 0;
    
    foreach ($mapaAfectado as $fila) {
        foreach ($fila as $celda) {
            if ($celda === 'Q') {
                $cabrasAfectadas += 3000;
            }
        }
    }
    
    $mlDesodorante = $cabrasAfectadas * 10;
    $litrosDesodorante = $mlDesodorante / 1000;
    
    return [
        'cabras' => $cabrasAfectadas,
        'litros' => $litrosDesodorante
    ];
}
// (4) Mapa de daños totales
function mapaDanosTotales($mapaOriginal, $impactos) {
    $mapaDanos = $mapaOriginal;
    
    foreach ($impactos as $impacto) {
        $fila = $impacto[0];
        $columna = $impacto[1];
        $terreno = $mapaDanos[$fila][$columna];
        
        if ($terreno === 'C') {
            $mapaDanos[$fila][$columna] = 'o';
        } else if ($terreno === '0') {
            $mapaDanos[$fila][$columna] = 'x';
        } else if ($terreno === '~') {
            $mapaDanos[$fila][$columna] = 's';
        }
    }
    
    return $mapaDanos;
}
// (5) Estimación de costes
function calcularCosteLimpieza($mapaDanos) {
    $costeTotal = 0;
    
    foreach ($mapaDanos as $fila) {
        foreach ($fila as $celda) {
            if ($celda === 'x') {
                $costeTotal += 75000;
            } else if ($celda === 'o') {
                $costeTotal += 250000;
            }
        }
    }
    
    return $costeTotal;
}
// (6/7) Recursos aprovechables
function totalAtmosfera($mapaOriginal) {
    $contador = 0;
    foreach ($mapaOriginal as $fila) {
        foreach ($fila as $celda) {
            if ($celda === '~') {
                $contador++;
            }
        }
    }
    return $contador;
}

function atmosferaAfectada($mapaDanos) {
    $contador = 0;
    foreach ($mapaDanos as $fila) {
        foreach ($fila as $celda) {
            if ($celda === 's') {
                $contador++;
            }
        }
    }
    return $contador;
}

// =========================================
// ESCRIBE AQUÍ TU PROGRAMA PRINCIPAL
// =========================================

mostrarMapa($capraMajoris);
echo"<br>";

$mapaAfectado = zonasAfectadas($capraMajoris, $impacts);
mostrarMapa($mapaAfectado);
echo"<br>";

$resultados = calcularCabrasYDesodorante($mapaAfectado);
echo "🐐Cabras afectadas: " . $resultados['cabras'] . "<br>";
echo "�Litros de desodorante anticheddar: " . $resultados['litros'] . " L<br>";
echo"<br>";

$mapaDanos = mapaDanosTotales($capraMajoris, $impacts);
mostrarMapa($mapaDanos);
echo"<br>";

$costeTotal = calcularCosteLimpieza($mapaDanos);
echo "� Coste total de limpieza: " . number_format($costeTotal, 0, ',', '.') . " €<br>";

$totalAtmosfera = totalAtmosfera($capraMajoris);
$atmosferaAfectada = atmosferaAfectada($mapaDanos);

if ($totalAtmosfera > 0) {
    $toneladasPeces = 1000;
    $pecesPorKm2 = $toneladasPeces / $totalAtmosfera;
    $pecesAfectados = $atmosferaAfectada * $pecesPorKm2;
    $recaudacion = $pecesAfectados * 1000 * 7;
    echo "� Recaudación ONG: " . number_format($recaudacion, 0, ',', '.') . " €<br>";
    $diferencia = $costeTotal - $recaudacion;
    echo "� Daños netos estimados: " . number_format($diferencia, 0, ',', '.') . " €<br>";
}
?>