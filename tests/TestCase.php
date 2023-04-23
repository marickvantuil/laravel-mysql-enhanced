<?php

namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \Marick\LaravelMysqlEnhanced\ServiceProvider::class,
        ];
    }
}
