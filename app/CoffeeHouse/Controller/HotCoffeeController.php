<?php

namespace App\CoffeeHouse\Controller;

use App\Coffeehouse\Model\Country;
use Core\DB\Model;

class HotCoffeeController {

    public function index(): void
    {

    }

    public function page(array &$viewData): void
    {
        $countryModel = new Country();
        $viewData['countries'] = $countryModel->getAll();
        $viewData['ingredients'] = $this->getIngredients();
        $viewData['additions'] = $this->getAdditions();
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
