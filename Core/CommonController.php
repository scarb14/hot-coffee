<?php

namespace Core;

class CommonController
{
    public function responseJson(array $data): void
    {
        print_r(json_encode($data));
        exit;
    }
}