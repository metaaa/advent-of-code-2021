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

function isInSync($matrix) {
    foreach ($matrix as $rk => $rv) {
        foreach ($rv as $ck => $cv) {
            if (intval($cv) !== 0) {
                return false;
            }
        }
    }

    return true;
}

$flashes = 0;
$synced = false;
$cnt = 1;
while (!$synced) {
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

    if (isInSync($m)) {
        $synced = true;
        echo("!Sync! step: " . $cnt . PHP_EOL);
    }

    $cnt++;
}

echo("Flashes: $flashes" . PHP_EOL);