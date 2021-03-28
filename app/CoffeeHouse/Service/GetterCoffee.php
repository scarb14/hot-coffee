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

    public function getSelectSql(): string
    {
        $select = [
            'co.id',
            'co.name',
            'cp.amount',
            'c.id',
            'cp.country_id',
            'c.name as country_name',
        ];
        return 'SELECT ' . join(',', $select) . ' FROM coffee co 
        INNER JOIN coffee_price cp ON co.id = cp.coffee_id
        INNER JOIN country c ON c.id = cp.country_id';
    }

    public function get(): array
    {
        $sql = $this->getSelectSql();
        return $this->model->select($sql);
    }

    public function getAtIdAndCountryId(int $coffeeId, int $countryId): array
    {

        $sql = $this->getSelectSql();
        $sql .= ' WHERE cp.coffee_id = ' . $coffeeId;
        $sql .= ' AND cp.country_id = ' . $countryId;
        return current($this->model->select($sql));
    }
}
