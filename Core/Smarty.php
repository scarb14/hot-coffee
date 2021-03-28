<?php

namespace Core;

class Smarty extends \Smarty
{
    public function __construct()
    {
        parent::__construct();

        $this->setCompileDir( dirname( __FILE__ ) . '/../smarty/templates_c' );
    }
}
