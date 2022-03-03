<?php

require __DIR__ . '/includes.php';

$test = new \App\Model\Manager\ArticleManager();
$test = $test->getAll();

echo '<pre>';
var_dump($test);
echo '</pre>';
