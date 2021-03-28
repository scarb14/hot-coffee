<?php

namespace App\Coffeehouse\Service;

use Core\DB\Model;
use Core\Utils\Arrays;

class GetterCoffeeIngredient
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
            'ci.id',
            'ci.name',
            'ci.short_name',
            'cip.country_id',
            'c.name as country_name',
            'cip.amount',
            'cit.name as type_name',
            'cip.coffee_id',
            'co.name as coffee_name',
        ];
        return 'SELECT ' . join(',', $select) . ' FROM coffee_ingredient ci 
        INNER JOIN coffee_ingredient_price cip ON ci.id = cip.ingredient_id
        INNER JOIN coffee_ingredient_type cit ON ci.type_id = cit.id
        INNER JOIN country c ON c.id = cip.country_id
        INNER JOIN coffee co ON co.id = cip.coffee_id';
    }

    public function get(): array
    {
        $sql = $this->getSelectSql();
        $result = $this->model->select($sql);
        return Arrays::groupBy($result, 'type_name');
    }

    public function getAtParams(array $ids, int $countryId, int $coffeeId): array
    {
        if (!$ids) {
            return [];
        }
        $sql = $this->getSelectSql();
        $sql .= ' WHERE ci.id IN (' . join(',', $ids) . ')';
        $sql .= ' AND cip.country_id = ' . $countryId;
        $sql .= ' AND cip.coffee_id = ' . $coffeeId;
        return $this->model->select($sql);
    }
}
