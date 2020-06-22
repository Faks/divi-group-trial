<?php

declare(strict_types=1);

namespace App\Controllers;

use function implode;
use function preg_replace;

class IsDivisibleController
{
    /**
     * @var array
     */
    private array $config;

    /**
     * @var string
     */
    protected static string $rewireRegex = '/\sInf; Qix; Foo;/m';

    /**
     * IsDivisibleService constructor.
     * @param array $getConfig
     */
    final public function __construct(array $getConfig)
    {
        $this->config = $getConfig;
    }

    /**
     * @return string
     */
    final public function iterate(): string
    {
        $match = [];

        if (isset($this->config['max']) === false) {
            echo 'Please Setup max.';
        }

        if (isset($this->config['separator']) === false) {
            echo 'Please Setup Separator.';
        }

        if (isset($this->config['matcher']) === false) {
            echo 'Please Setup matcher.';
        }

        if ($this->config['max'] === 0) {
            die('Matcher Invalid max value.');
        }

        for ($i = 0; $i <= $this->config['max']; $i++) {
            foreach ($this->config['matcher'] as $integer => $response) {
                if ($i >= 1 && $i % $integer === 0) {
                    $match[$i] = $this->config['append'] ? $i . ', ' . $response : $response;
                }
            }
        }

        $baseResponse = implode($this->config['separator'], $match);

        if (isset($this->config['rewire']) === true) {
            return preg_replace(self::$rewireRegex, 'Inf; Qix; FooInf', $baseResponse);
        }

        return $baseResponse;
    }
}
