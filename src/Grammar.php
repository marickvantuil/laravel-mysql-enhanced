<?php

declare(strict_types=1);

namespace Marick\LaravelMysqlEnhanced;

use Illuminate\Database\Query\Builder as BaseBuilder;
use Illuminate\Database\Query\Grammars\PostgresGrammar;

class Grammar extends PostgresGrammar
{
    use GrammarWhere;

    public function compileSelect(BaseBuilder $query): string
    {
        return parent::compileSelect($query);
    }
}
