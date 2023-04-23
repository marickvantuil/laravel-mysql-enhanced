<?php

declare(strict_types=1);

namespace Marick\LaravelMysqlEnhanced;

use Illuminate\Database\Query\Builder as BaseBuilder;

class QueryBuilder extends BaseBuilder
{
    use BuilderLateralJoin;
}

