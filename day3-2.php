<?php

$data = [
'00100',
'11110',
'10110',
'10111',
'10101',
'01111',
'00111',
'11100',
'10000',
'11001',
'00010',
'01010',
];

$validOxigens = $validCo2s = $data;
$oxigen = $co2 = 0;

$oxiPos = 0;
while (count($validOxigens) > 1) {
    $bitCounter = [];
    foreach ($validOxigens as $item) {
        foreach (str_split($item) as $key => $bit) {
            if ($bit == 0) {
                if (isset($bitCounter[$key][0])) {
                    $bitCounter[$key][0]++;
                } else {
                    $bitCounter[$key][0] = 1;
                }
            } else {
                if (isset($bitCounter[$key][1])) {
                    $bitCounter[$key][1]++;
                } else {
                    $bitCounter[$key][1] = 1;
                }
            }
        }
    }

    foreach ($bitCounter as $pos => $val) {
        $mostCommon = $bitCounter[$oxiPos][1] >= $bitCounter[$oxiPos][0] ? 1 : 0;
        foreach($validOxigens as $index => $item) {
            $char = str_split($item)[$oxiPos];

            if ($mostCommon == $char) {
                $oxigen = $item;
                    continue;
            } else {
                unset($validOxigens[$index]);
            }
        }
    }
    $oxiPos++;
}

$co2Pos = 0;
while (count($validCo2s) > 1) {
    $bitCounter = [];
    foreach ($validCo2s as $item) {
        foreach (str_split($item) as $key => $bit) {
            if ($bit == 0) {
                if (isset($bitCounter[$key][0])) {
                    $bitCounter[$key][0]++;
                } else {
                    $bitCounter[$key][0] = 1;
                }
            } else {
                if (isset($bitCounter[$key][1])) {
                    $bitCounter[$key][1]++;
                } else {
                    $bitCounter[$key][1] = 1;
                }
            }
        }
    }

    foreach ($bitCounter as $pos => $val) {
        $leastCommon = $bitCounter[$co2Pos][0] <= $bitCounter[$co2Pos][1] ? 0 : 1;
        foreach($validCo2s as $index => $item) {
            $char = str_split($item)[$co2Pos];

            if ($leastCommon == $char) {
                    $co2 = $item;
                    continue;
            } else {
                unset($validCo2s[$index]);
            }
        }
    }
    $co2Pos++;
}

var_export(bindec($oxigen) * bindec($co2));