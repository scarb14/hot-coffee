<?php

namespace App\CoffeeHouse\Controller;

class HotCoffeeController {

    public function index(): void
    {

    }

    public function page(array &$viewData): void
    {
        $viewData['countries'] = [
            [
                'id' => 1,
                'name' => 'Испания',
            ],
            [
                'id' => 1,
                'name' => 'Италия',
            ],
        ];
    }
}
