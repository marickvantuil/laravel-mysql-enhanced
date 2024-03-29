<?php

namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            \Marick\LaravelMysqlEnhanced\MysqlEnhancedServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app->config['database.default'] = 'mysql';
    }
}
