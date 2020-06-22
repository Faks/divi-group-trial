<?php

declare(strict_types=1);

use App\Controllers\IsDivisibleController;

require __DIR__ . '/vendor/autoload.php';

$isFooBarQixController = new isDivisibleController(
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

echo $isFooBarQixController->iterate();

echo '<p></p>';

$isFooBarQixControllerWithAppend = new isDivisibleController(
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

echo $isFooBarQixControllerWithAppend->iterate();

echo '<p></p>';

$InfQixFooController = new isDivisibleController(
    [
        'max'       => 1000,
        'separator' => '; ',
        'append'    => false,
        'matcher'   => [
            8 => 'Inf',
            7 => 'Qix',
            5 => 'Bar',
        ]
    ]
);

echo $InfQixFooController->iterate();

echo '<p></p>';

$InfQixFooWithAppendController = new isDivisibleController(
    [
        'max'       => 1000,
        'separator' => '; ',
        'append'    => true,
        'matcher'   => [
            3 => 'Foo',
            8 => 'Inf',
            7 => 'Qix',
        ]
    ]
);

echo $InfQixFooWithAppendController->iterate();
