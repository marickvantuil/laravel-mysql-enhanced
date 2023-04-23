<?php

declare(strict_types=1);

namespace Marick\LaravelMysqlEnhanced;

use Closure;
use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use PDO;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        Connection::resolverFor('mysql', function (PDO|Closure $pdo, string $database = '', string $tablePrefix = '', array $config = []) {
            return new MysqlEnhancedConnection($pdo, $database, $tablePrefix, $config);
        });
    }
}
