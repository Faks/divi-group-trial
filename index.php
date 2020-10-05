<?php

declare(strict_types=1);

use App\Controllers\IsDivisibleController;

require __DIR__ . '/vendor/autoload.php';

echo '<ul style="display: flex;
    list-style: none;">
                  <li>
                        <a style="padding-right: 15px;" href="https://bitbucket.org/Faks/divi-group-trial/src/master/">Bitbucket</a>
                    </li>
                    <li>
                        <a style="padding-right: 15px;" href="https://www.linkedin.com/in/oskars-germovs-a94b3318a/">LinkedIn</a>
                    </li>
</ul><p></p>';

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
            3 => 'Foo',
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

echo '<p></p>';

$InfQixFooControllerFinal = new isDivisibleController(
    [
        'max'       => 1000,
        'separator' => '; ',
        'append'    => false,
        'rewire'    => true,
        'matcher'   => [
            8 => 'Inf',
            7 => 'Qix',
            3 => 'Foo',
        ]
    ]
);

echo $InfQixFooControllerFinal->iterate();

