<?php

namespace App\Coffeehouse\Model;

use Core\DB\Model;

class Country extends Model
{
    const TABLE_NAME = 'country';
    const TABLE_PREFIX = 'c';
    const TABLE_PREFIX_FIELD = 'c.';
}
