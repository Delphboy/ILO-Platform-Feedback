<?php
class CalcClass {
    var $number1 = 0, $number2=0, $operation = '';
    public function __construct($number1, $number2, $operation) {
        $this->number1 = $number1;
        $this->number2 = $number2;
        $this->operation = $operation;
    }
    public function calculate() {
        if (is_numeric($this->number1) && is_numeric($this->number2))
        {
            if ($this->operation == 'Add')
            {
                $result = $this->number1 + $this->number2;
            }
            elseif ($this->operation == 'Subtract')
            {
                $result = $this->number1 - $this->number2;;
            }
            elseif ($this->operation == 'Multiply')
            {
                $result = $this->number1 * $this->number2;;
            }
            elseif ($this->operation == 'Divide')
            {
                $result = $this->number1 / $this->number2;;
            }
            else
            {
                $result = 'error';
            }
        }
        else
        {
            $result = false;
        }
        return $result;
    }
}
