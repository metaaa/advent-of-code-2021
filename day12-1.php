<?php

$input = [
    'start-A',
    'start-b',
    'A-c',
    'A-b',
    'b-d',
    'A-end',
    'b-end',
];

$matrix = [
    'start' => [],
];

function rSet($arr, $key, $pair) {
    if (is_array($arr)) {
        foreach ($arr as $key => $value) {
    
        }
    } else {
        if ($arr === $key) {
            $arr
        }
    }
}

foreach ($input as $index => $connection) {
    list($a, $b) = explode('-', $connection);

    $found = rSet($matrix, $a, $b);
    if (!$found) {
        $found = rSet($matrix, $b, $a);
    }

    if ($found) {
        unset($input[$index]);
    }
}
