<?php

const DIR_CONFIG = __DIR__ . '/../config';

spl_autoload_register(function ($className) {
    $paths = include DIR_CONFIG . '/path.php';
    $className = str_replace('\\', '/', $className);

    foreach ($paths['classes'] as $path) {
        $fileName = __DIR__ . "/../$path/$className.php";
        if (file_exists($fileName)) {
            require_once $fileName;
        }
    }
});

function getConfigs(string $path = DIR_CONFIG): array
{
    $settings = [];
    foreach (scandir($path) as $file) {
        $name = explode('.', $file)[0];
        if (!empty($name)) {
            $settings[$name] = include "$path/$file";
        }
    }
    return $settings;
}

require_once __DIR__ . '/../routes/web.php';

return new Src\Application(new Src\Settings(getConfigs()));
