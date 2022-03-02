<?php

use App\Model\DB;
use App\Model\Manager\RoleManager;
use App\Model\Manager\UserManager;

require __DIR__ . '/includes.php';

$test = new \App\Model\Manager\ArticleManager();
$test = $test->getAll();

echo '<pre>';
var_dump($test);
echo '</pre>';
