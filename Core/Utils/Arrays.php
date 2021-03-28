<?php

namespace Core\Utils;

class Arrays
{
    public static function groupBy(array $array, string $groupKey): array
    {
        $groupArray = [];
        foreach ($array as $key => $value) {
            if (isset($value[$groupKey])) {
                $groupArray[$value[$groupKey]][] = $value;
            }
        }
        return $groupArray;
    }
}
