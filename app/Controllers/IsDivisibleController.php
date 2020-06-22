<?php

declare(strict_types=1);

namespace App\Controllers;

use function implode;

class IsDivisibleController
{
    /**
     * @var array
     */
    private array $config;

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

        if ($this->config['max'] === 0) {
            die('Matcher Invalid max value.');
        }

        for ($i = 0; $i <= $this->config['max']; $i++) {
            foreach ($this->config['matcher'] as $integer => $response) {
                if ($i >= 1 && $i % $integer === 0) {
                    $match[$i] = $response;
                }
            }
        }

        return implode($this->config['separator'], $match);
    }
}
