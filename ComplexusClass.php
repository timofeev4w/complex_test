<?php

interface ArithmeticMeth
{
    public function getAddition();
    public function getSubtraction();
    public function getMultiplication();
    public function getDivision();
}

class Complexus
{
    protected $first_real;
    protected $first_imag;
    protected $second_real;
    protected $second_imag;

    public function __construct($first_real, $first_imag, $second_real, $second_imag)
    {
        $this->first_real = $first_real;
        $this->first_imag = $first_imag;
        $this->second_real = $second_real;
        $this->second_imag = $second_imag;
    }
}

class Arithmetic extends Complexus implements ArithmeticMeth
{
    private function getResult($real,$imag, $result)
    {
        if ($real != 0) {
            $result .= $real."+";
        }

        if ($imag > 0) {
            $result .= $imag."i";
        }elseif ($imag < 0) {
            $imag = abs($imag);
            $result = substr($result, 0, -1);
            $result .= "-".$imag."i";
        }else {
            $result = substr($result, 0, -1);
        }

        if ($real == 0 && $imag == 0) {
            $result .= "0";
        }

        echo $result.PHP_EOL;
    }

    public function getAddition()
    {
        $real = $this->first_real + $this->second_real;
        $imag = $this->first_imag + $this->second_imag;
        $result = "Сумма комплексных чисел равна: ";

        $this->getResult($real, $imag, $result);
    }

    public function getSubtraction()
    {
        $real = $this->first_real - $this->second_real;
        $imag = $this->first_imag - $this->second_imag;
        $result = "Разность комплексных чисел равна: ";

        $this->getResult($real, $imag, $result);
    }

    public function getMultiplication()
    {
        $real = ($this->first_real * $this->second_real) + ($this->first_imag * $this->second_imag*-1);
        $imag = ($this->first_real * $this->second_imag) + ($this->first_imag * $this->second_real);
        $result = "Произведение комплексных чисел равно:  ";

        $this->getResult($real, $imag, $result);
    }

    public function getDivision()
    {
        $real = ($this->first_real * $this->second_real + $this->first_imag * $this->second_imag) / ($this->second_real**2 + $this->second_imag**2);
        $imag = ($this->first_imag * $this->second_real - $this->first_real * $this->second_imag) / ($this->second_real**2 + $this->second_imag**2);
        $result = "Частное комплексных чисел равно:  ";

        $this->getResult($real, $imag, $result);
    }

    
}

class ComplexusResult
{
    public function setVals($first_real, $first_imag, $second_real, $second_imag, $operation)
    {
        $val_case = false;
        while ($val_case != true) {
            $array_vals = array($first_real, $first_imag, $second_real, $second_imag);
            $val_result = 0;
            foreach ($array_vals as $value) {
                if (is_numeric($value) == true) {
                    $val_result += 1;
                }
            }
            if ($val_result == 4) {
                $val_case = true;
            }else {
                echo "Все части комплесных чисел должным быть числами с плавающей точкой или целыми!".PHP_EOL;
            }
        }


        $operation_case = false;

        while ($operation_case == false) {
            if ($operation == '+' || $operation == '-' || $operation == '*' || $operation == '/') {
                if ($operation == '/' && $second_real == 0 && $second_imag == 0) {
                    echo "На 0 делить нельзя!".PHP_EOL;
                    break;
                }
                $result = new Arithmetic($first_real, $first_imag, $second_real, $second_imag);
                $operation_case = true;
                switch ($operation) {
                    case '+':
                        echo $result->getAddition();
                        break;
                
                    case '-':
                        echo $result->getSubtraction();
                        break;
                
                    case '*':
                        echo $result->getMultiplication();
                        break;
                
                    case '/':
                        echo $result->getDivision();
                        break;
                }
                
                
            }else {
                echo "Выберите верное действие!".PHP_EOL;
                $operation = readline('Какую операцию хотите выполнить? (+, -, *, /) ');
            }
        }
    }
}


?>