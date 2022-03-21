<?php

// Помимо основной проверки, можно выполнить проверку на различные типы данных и арифметические знаки сняв знак комментариев

require_once 'ComplexusClass.php';

$test_array = [
    [2, 3],
    [2, -3],
    [2, 0],
    // [2, 'n'],

    [-2, 3],
    [-2, -3],
    [-2, 0],
    // [-2, 'n'],

    [0, 3],
    [0, -3],
    [0, 0],
    // [0, 'n'],

    // ['n', 3],
    // ['n', -3],
    // ['n', 0],
    // ['n', 'n'],

    // [null, 3],
    // [null, -3],
    // [null, 0],
    // [null, 'n'],

    // [true, 3],
    // [true, -3],
    // [true, 0],
    // [true, 'n'],
];

$sign_array = ['+', '-', '*', '/'/*, null, 3, 'n'*/];

$test_array_count = count($test_array);
$sign_array_count = count($sign_array);


for ($i=0; $i < $test_array_count; $i++) { 
    for ($z=0; $z < $test_array_count; $z++) {
        $first_real = $test_array[$i][0];
        $first_imag = $test_array[$i][1];
        $second_real = $test_array[$z][0];
        $second_imag = $test_array[$z][1]; 
        for ($m=0; $m < $sign_array_count; $m++) { 
            $test = new ComplexusResult;
            $test->setVals($first_real, $first_imag, $second_real, $second_imag, $sign_array[$m]);
        }
        
    }
}

?>