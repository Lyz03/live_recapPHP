<?php

require __DIR__ . '/includes.php';

$test = new \App\Model\Manager\UserRoleManager();
$test = $test->getUserByRoleId(2);

echo '<pre>';
var_dump($test);
echo '</pre>';
