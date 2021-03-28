<?php

namespace App\Coffeehouse\Service;

use Core\DB\Model;
use Core\Utils\Arrays;

class GetterCoffee
{
    /** @var Model */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get(): array
    {
        $select = [
            'co.id',
            'co.name',
            'cp.amount',
            'c.id',
            'c.name as country_name',
        ];
        $sql = 'SELECT ' . join(',', $select) . ' FROM coffee co 
        INNER JOIN coffee_price cp ON co.id = cp.coffee_id
        INNER JOIN country c ON c.id = cp.country_id
        ';
        return $this->model->select($sql);
    }
}
