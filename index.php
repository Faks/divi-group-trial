<?php

declare(strict_types=1);

use App\Controllers\IsDivisibleController;

require __DIR__ . '/vendor/autoload.php';

$isDivisibleController = new isDivisibleController(
    [
        'max'       => 1000,
        'separator' => ', ',
        'append'    => false,
        'matcher'   => [
            3 => 'Foo',
            5 => 'Bar',
            7 => 'Qix',
        ]
    ]
);

echo $isDivisibleController->iterate();

echo '<p></p>';

$isDivisibleControllerWithAppend = new isDivisibleController(
    [
        'max'       => 1000,
        'separator' => ', ',
        'append'    => true,
        'matcher'   => [
            3 => 'Foo',
            5 => 'Bar',
            7 => 'Qix',
        ]
    ]
);

echo $isDivisibleControllerWithAppend->iterate();
