<?php

$input = [
    'be cfbegad cbdgef fgaecd cgeb fdcge agebfd fecdb fabcd edb.fdgacbe cefdb cefbgd gcbe',
    'edbfga begcd cbg gc gcadebf fbgde acbgfd abcde gfcbed gfec.fcgedb cgb dgebacf gc',
    'fgaebd cg bdaec gdafb agbcfd gdcbef bgcad gfac gcb cdgabef.cg cg fdcagb cbg',
    'fbegcd cbd adcefb dageb afcb bc aefdc ecdab fgdeca fcdbega.efabcd cedba gadfec cb',
    'aecbfdg fbg gf bafeg dbefa fcge gcbea fcaegb dgceab fcbdga.gecf egdcabf bgf bfgea',
    'fgeab ca afcebg bdacfeg cfaedg gcfdb baec bfadeg bafgc acf.gebdcfa ecba ca fadegcb',
    'dbcfg fgd bdegcaf fgec aegbdf ecdfab fbedc dacgb gdcebf gf.cefg dcbef fcge gbcadfe',
    'bdfegc cbegaf gecbf dfcage bdacg ed bedf ced adcbefg gebcd.ed bcgafe cdgba cbgef',
    'egadfb cdbfeg cegd fecab cgb gbdefca cg fgcdab egfdb bfceg.gbdfcae bgc cg cgb',
    'gcafb gcf dcaebfg ecagb gf abcdeg gaef cafbge fdbac fegbdc.fgae cfgab fg bagce',
];
$patterns = [
    0 => '/\b(a|b|c|d|e|g){6}\b/',
    1 => '/\b(a|b){2}/',
    2 => '/\b(a|c|d|f|g){5}\b/',
    3 => '/\b(a|b|c|d|f){5}\b/',
    4 => '/\b(a|b|e|f)\b/',
    5 => '/\b(b|c|d|e|f){5}\b/',
    6 => '/\b(b|c|d|e|f|g){6}\b/',
    7 => '/\b(a|b|d)\b/',
    8 => '/\b(a|b|c|d|e|f|g)\b/',
    9 => '/\b(a|b|c|d|e|f){6}\b/',
];

$arr = [];
foreach ($input as $inputStr) {
    $temp = explode('.', $inputStr);
    $arr[] = [
        'signal' => explode(' ', $temp[0]),
        'output' => explode(' ', $temp[1]),
    ];
}

$signalArr = [];
foreach ($arr as $index => $source) {
    $foreach ($arr['signal'] as $signalPart) {
        $signalArr[$index][8] = '/\b(a|b|c|d|e|f|g)\b/';
    }
}

$ret = [];
foreach ($arr as $code) {
    $numStr = '';
    foreach ($code['output'] as $resultStr) {
        foreach ($patterns as $number => $regexp) {
            if (preg_match($regexp, $resultStr, $out) === 1) {
                $numStr .= $number;
            }
        }
    }
    var_export(intval($numStr) . PHP_EOL);
    if (strlen($numStr) === 4) {
        var_export(intval($numStr) . PHP_EOL);
        $ret[] = intval($numStr);
    }
}
$sum = 0;
foreach ($ret as $num) {
    $sum += $num;
}

var_export(PHP_EOL . $sum . PHP_EOL);