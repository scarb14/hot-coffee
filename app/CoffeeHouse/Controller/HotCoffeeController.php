<?php

namespace App\CoffeeHouse\Controller;

use App\Coffeehouse\Model\Country;
use App\Coffeehouse\Service\GetterCoffee;
use App\Coffeehouse\Service\GetterCoffeeIngredient;
use Core\DB\Model;

class HotCoffeeController {

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
        $viewData['ingredients'] = $getterCoffeeIngredient->get();
    }

    private function getIngredients(): array
    {
        return [
            [
                'id'            => 1,
                'name'          => 'Молоко',
                'short_name'    => 'moloko',
            ],
            [
                'id'            => 2,
                'name'          => 'Сироп',
                'short_name'    => 'sirop',
            ],
        ];
    }

    private function getAdditions(): array
    {
        return [
            [
                'id'            => 1,
                'name'          => 'Шоколад',
                'short_name'    => 'moloko',
            ],
            [
                'id'            => 2,
                'name'          => 'Круассан',
                'short_name'    => 'kryossan',
            ],
        ];
    }
}
