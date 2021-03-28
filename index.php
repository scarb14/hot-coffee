<?php

require_once('vendor/autoload.php');

use Core\App;
use Core\Smarty;

$app = new App(new Smarty());
$app->route();