<?php

namespace App\Coffeehouse\Service;

class CalculatorAmountCoffee
{
    public function getTotalAmount(array $coffee, array $ingredients, float $percentTax): float
    {
        $amount = 0;
        $amount += $coffee['amount'];
        foreach ($ingredients as $item) {
            $amount += $item['amount'];
        }
        $amount += $amount / 100 * $percentTax;
        return $amount;
    }
}