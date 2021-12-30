<?php

$input = [
    '6111821767',
    '1763611615',
    '3512683131',
    '8582771473',
    '8214813874',
    '2325823217',
    '2222482823',
    '5471356782',
    '3738671287',
    '8675226574',
];

$m = [];
foreach($input as $index => $row) {
    $m[$index] = str_split($row);
}

function firstStep($matrix) {
    foreach ($matrix as $rowIndex => $rowValue) {
        foreach ($rowValue as $colIndex => $colValue) {
            // if (intval($colValue) === 9) {
            //     continue;
            // }
            $matrix[$rowIndex][$colIndex]++;
        }
    }

    return $matrix;
}

function handleFlashes($mClone, $rIndex, $cIndex) {
    for ($rIdx = -1; $rIdx <= 1; $rIdx++) {
        if (($rIndex + $rIdx) < 0 || ($rIndex + $rIdx) > 9) {
            continue;
        }
        for ($cIdx = -1; $cIdx <= 1; $cIdx++) {
            if (($cIndex + $cIdx) < 0 || ($cIndex + $cIdx) > 9) {
                continue;
            }

            if (intval($mClone[$rIndex + $rIdx][$cIndex + $cIdx]) === 0 || intval($mClone[$rIndex + $rIdx][$cIndex + $cIdx]) === 10) {
                continue;
            } else {
                $mClone[$rIndex + $rIdx][$cIndex + $cIdx]++;
            }
        }
    }
    return $mClone;
}

$flashes = 0;
for ($i = 0; $i < 100; $i++) {
    $m = firstStep($m);
    $hasNines = true;
    while($hasNines) {
        $found = false;
        foreach ($m as $rIndex => $rVal) {
            foreach ($rVal as $cIndex => $cVal) {
                if (intval($cVal) === 10) {
                    $found = true;
                    $m[$rIndex][$cIndex] = 0;
                    $flashes++;
                    $m = handleFlashes($m, $rIndex, $cIndex);
                }
            }
        }

        if (!$found) {
            $hasNines = false;
        }
    }

    if ($i === 1) {
        foreach ($m as $rk => $rv) {
            echo(implode('', $rv) . PHP_EOL);
        }
    }
}

echo("Flashes: $flashes" . PHP_EOL);