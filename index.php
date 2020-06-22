<?php

declare(strict_types=1);

use App\Controllers\IsDivisibleController;

require __DIR__ . '/vendor/autoload.php';

$isDivisibleController = new isDivisibleController(
    [
        'max'       => 1000,
        'separator' => ', ',
        'matcher'   => [
            3 => 'Foo',
            5 => 'Bar'
        ]
    ]
);

echo $isDivisibleController->iterate();
