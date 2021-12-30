<?php

$input = [3,4,3,1,2];

$days = 80;

for ($i = 0; $i < $days; $i++) {
    foreach($input as $index => $number) {
        if ($number > 0) {
            $input[$index]--;
        } else {
            $input[$index] = 6;
            $input[] = 8;
        }
    }
}

echo("count: " . count($input));