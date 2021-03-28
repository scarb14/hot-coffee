<?php

namespace App\CoffeeHouse\Controller;

use App\Coffeehouse\Model\CoffeeTax;
use App\Coffeehouse\Model\Country;
use App\Coffeehouse\Service\CalculatorAmountCoffee;
use App\Coffeehouse\Service\GetterCoffee;
use App\Coffeehouse\Service\GetterCoffeeIngredient;
use Core\CommonController;
use Core\DB\Model;

class HotCoffeeController extends CommonController
{

    public function index(): void
    {

    }

    public function page(array &$viewData): void
    {
        $countryModel = new Country();
        $model = new Model();
        $getterCoffeeIngredient = new GetterCoffeeIngredient($model);
        $getterCoffee = new GetterCoffee($model);
        $viewData['coffee'] = $getterCoffee->get();
        $viewData['countries'] = $countryModel->getAll();
        $viewData['default_country_name'] = 'Испания';
        $viewData['title'] = 'Заказать кофе онлайн';
        $viewData['ingredients'] = $getterCoffeeIngredient->get();
    }

    public function make_coffee(): void
    {
        $countryId = (int) $_POST['county_id'] ?? 0;
        $coffeeId = (int) $_POST['coffee_id'] ?? 0;
        $ingredientIds = $_POST['ingredient_ids'] ?? [];

        $model = new Model();
        $getterCoffee = new GetterCoffee($model);
        $coffee = $getterCoffee->getAtIdAndCountryId($coffeeId, $countryId);
        if (!$coffee) {
            $this->responseJson([
                'success' => false,
                'message' => 'Invalid params',
            ]);
        }
        $getterCoffeeIngredient = new GetterCoffeeIngredient($model);
        $ingredients = $getterCoffeeIngredient->getAtParams($ingredientIds, $countryId, $coffeeId);
        $coffeeTax = new CoffeeTax();
        $tax = $coffeeTax->getPercentAtCountryId($countryId);
        $data = [
            'success' => true,
            'message' => $this->getMessageForMakeCoffee($coffee, $ingredients, $tax),
        ];
        $this->responseJson($data);
    }

    private function getMessageForMakeCoffee(array $coffee, array $ingredients, float $tax): string
    {
        $msg = "Ваш заказ:\n";
        $msg .= $coffee['name'] . ': (' . $coffee['amount'] . " €)\n";
        foreach ($ingredients as $item) {
            $msg .= $item['name'] . ': (' . $item['amount'] . " €)\n";
        }
        $msg .= 'Налог: ' . $tax . '%' . "\n";
        $calculatorAmountCoffee = new CalculatorAmountCoffee();
        $totalAmount = $calculatorAmountCoffee->getTotalAmount($coffee, $ingredients, $tax);
        $msg .= 'Итого: ' . $totalAmount .  " €\n";
        return $msg;
    }
}
