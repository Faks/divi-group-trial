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
                'append'    => false,
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
                'append'    => false,
                'matcher'   => [
                    5 => 'Bar',
                ]
            ]
        );

        $this->assertSame('Bar', $isDivisibleController->iterate());
    }

    /** @test */
    final public function isQix()
    {
        $isDivisibleController = new isDivisibleController(
            [
                'max'       => 7,
                'separator' => ', ',
                'append'    => false,
                'matcher'   => [
                    7 => 'Qix',
                ]
            ]
        );

        $this->assertSame('Qix', $isDivisibleController->iterate());
    }

    /** @test */
    final public function isFooWithAppend()
    {
        $isDivisibleController = new isDivisibleController(
            [
                'max'       => 3,
                'separator' => ', ',
                'append'    => true,
                'matcher'   => [
                    3 => 'Foo',
                ]
            ]
        );

        $this->assertSame('3, Foo', $isDivisibleController->iterate());
    }

    /** @test */
    final public function isBarWithAppend()
    {
        $isDivisibleController = new isDivisibleController(
            [
                'max'       => 5,
                'separator' => ', ',
                'append'    => true,
                'matcher'   => [
                    5 => 'Bar',
                ]
            ]
        );

        $this->assertSame('5, Bar', $isDivisibleController->iterate());
    }

    /** @test */
    final public function isQixWithAppend()
    {
        $isDivisibleController = new isDivisibleController(
            [
                'max'       => 7,
                'separator' => ', ',
                'append'    => true,
                'matcher'   => [
                    7 => 'Qix',
                ]
            ]
        );

        $this->assertSame('7, Qix', $isDivisibleController->iterate());
    }
}
