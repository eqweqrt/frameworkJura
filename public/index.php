<?php
declare(strict_types=1);

try {
    $parentDir = dirname(__DIR__);
    $bootstrapPath = $parentDir . '/core/bootstrap.php';
    //echo $bootstrapPath;

    $app = require_once $bootstrapPath;
    $app->run();
} catch (Throwable $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre';
}