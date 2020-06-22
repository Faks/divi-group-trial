<?php

declare(strict_types=1);

namespace Tests;

use App\Controllers\IsDivisibleController;
use PHPUnit\Framework\TestCase;

use function preg_match;

final class IsDivisibleTest extends TestCase
{
    /** @test */
    final public function isFoo()
    {
        $isFooBarQixController = new isDivisibleController(
            [
                'max'       => 3,
                'separator' => ', ',
                'append'    => false,
                'matcher'   => [
                    3 => 'Foo',
                ]
            ]
        );

        $this->assertSame('Foo', $isFooBarQixController->iterate());
    }

    /** @test */
    final public function isBar()
    {
        $isFooBarQixController = new isDivisibleController(
            [
                'max'       => 5,
                'separator' => ', ',
                'append'    => false,
                'matcher'   => [
                    5 => 'Bar',
                ]
            ]
        );

        $this->assertSame('Bar', $isFooBarQixController->iterate());
    }

    /** @test */
    final public function isQix()
    {
        $isFooBarQixController = new isDivisibleController(
            [
                'max'       => 7,
                'separator' => ', ',
                'append'    => false,
                'matcher'   => [
                    7 => 'Qix',
                ]
            ]
        );

        $this->assertSame('Qix', $isFooBarQixController->iterate());
    }


    /** @test */
    final public function isFooWithAppend()
    {
        $isFooBarQixControllerWithAppend = new isDivisibleController(
            [
                'max'       => 3,
                'separator' => ', ',
                'append'    => true,
                'matcher'   => [
                    3 => 'Foo',
                ]
            ]
        );

        $this->assertSame('3, Foo', $isFooBarQixControllerWithAppend->iterate());
    }

    /** @test */
    final public function isBarWithAppend()
    {
        $isFooBarQixControllerWithAppend = new isDivisibleController(
            [
                'max'       => 5,
                'separator' => ', ',
                'append'    => true,
                'matcher'   => [
                    5 => 'Bar',
                ]
            ]
        );

        $this->assertSame('5, Bar', $isFooBarQixControllerWithAppend->iterate());
    }

    /** @test */
    final public function isQixWithAppend()
    {
        $isFooBarQixControllerWithAppend = new isDivisibleController(
            [
                'max'       => 7,
                'separator' => ', ',
                'append'    => true,
                'matcher'   => [
                    7 => 'Qix',
                ]
            ]
        );

        $this->assertSame('7, Qix', $isFooBarQixControllerWithAppend->iterate());
    }


    /** @test */
    final public function isInfWithSemiColon()
    {
        $InfQixFooController = new isDivisibleController(
            [
                'max'       => 8,
                'separator' => '; ',
                'append'    => false,
                'matcher'   => [
                    8 => 'Inf',
                ]
            ]
        );

        $this->assertSame('Inf', $InfQixFooController->iterate());
    }

    /** @test */
    final public function isQixWithSemiColon()
    {
        $InfQixFooController = new isDivisibleController(
            [
                'max'       => 7,
                'separator' => '; ',
                'append'    => false,
                'matcher'   => [
                    7 => 'Qix',
                ]
            ]
        );

        $this->assertSame('Qix', $InfQixFooController->iterate());
    }

    /** @test */
    final public function isFooWithSemiColon()
    {
        $InfQixFooController = new isDivisibleController(
            [
                'max'       => 3,
                'separator' => '; ',
                'append'    => false,
                'matcher'   => [
                    3 => 'Foo',
                ]
            ]
        );

        $this->assertSame('Foo', $InfQixFooController->iterate());
    }

    /** @test */
    final public function isFooWithSemiColonAppend()
    {
        $InfQixFooWithAppendController = new isDivisibleController(
            [
                'max'       => 3,
                'separator' => '; ',
                'append'    => true,
                'matcher'   => [
                    3 => 'Foo',
                ]
            ]
        );

        $this->assertSame('3, Foo', $InfQixFooWithAppendController->iterate());
    }

    /** @test */
    final public function isInfWithSemiColonAppend()
    {
        $InfQixFooWithAppendController = new isDivisibleController(
            [
                'max'       => 8,
                'separator' => '; ',
                'append'    => true,
                'matcher'   => [
                    8 => 'Inf',
                ]
            ]
        );

        $this->assertSame('8, Inf', $InfQixFooWithAppendController->iterate());
    }

    /** @test */
    final public function isQixWithSemiColonAppend()
    {
        $InfQixFooWithAppendController = new isDivisibleController(
            [
                'max'       => 7,
                'separator' => '; ',
                'append'    => true,
                'matcher'   => [
                    7 => 'Qix',
                ]
            ]
        );

        $this->assertSame('7, Qix', $InfQixFooWithAppendController->iterate());
    }

    /** @test */
    final public function isStepFinal()
    {
        $InfQixFooControllerFinal = new isDivisibleController(
            [
                'max'       => 170,
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

        preg_match('/(Inf; Qix; FooInf)/', $InfQixFooControllerFinal->iterate(), $matches, PREG_OFFSET_CAPTURE, 0);

        $this->assertSame('Inf; Qix; FooInf', $matches[0][0]);
    }
}
