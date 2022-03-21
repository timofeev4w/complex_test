<?php

require_once 'ComplexusClass.php';

$first_real = readline('Введите действительную часть Первого комплексного числа: ');
$first_imag = readline('Введите мнимую часть Первого комплексного числа: ');
$second_real = readline('Введите действительную часть Второго комплексного числа: ');
$second_imag = readline('Введите мнимую часть Второго комплексного числа: ');
$operation = readline('Какую операцию хотите выполнить? (+, -, *, /) ');

$result = new ComplexusResult();
$result->setVals($first_real, $first_imag, $second_real, $second_imag, $operation);


?>