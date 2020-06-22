<?php

declare(strict_types=1);

namespace Tests;

use App\Controllers\IsDivisibleController;
use PHPUnit\Framework\TestCase;

final class IsDivisibleTest extends TestCase
{
    /** @test */
    final public function isFoo()
    {
        $isDivisibleController = new isDivisibleController(
            [
                'max'       => 3,
                'separator' => ', ',
                'matcher'   => [
                    3 => 'Foo',
                ]
            ]
        );

        $this->assertSame('Foo', $isDivisibleController->iterate());
    }

    /** @test */
    final public function isBar()
    {
        $isDivisibleController = new isDivisibleController(
            [
                'max'       => 5,
                'separator' => ', ',
                'matcher'   => [
                    5 => 'Bar',
                ]
            ]
        );

        $this->assertSame('Bar', $isDivisibleController->iterate());
    }
}
