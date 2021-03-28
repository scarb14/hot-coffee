<?php

namespace App\Coffeehouse\Model;

use Core\DB\Model;

class CoffeeTax extends Model
{
    const TABLE_NAME = 'coffee_tax';
    const TABLE_PREFIX = 'ct';
    const TABLE_PREFIX_FIELD = 'ct.';

    public function getPercentAtCountryId(int $countyId): float
    {
        $sql = 'SELECT `percent` FROM ' . self::TABLE_NAME . ' WHERE country_id = ' . $countyId;
        return $this->fetchFirstField($sql);
    }
}
