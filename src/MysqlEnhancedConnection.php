<?php

declare(strict_types=1);

namespace Marick\LaravelMysqlEnhanced;

use Illuminate\Database\MySqlConnection;

class MysqlEnhancedConnection extends MySqlConnection
{
    public function query(): QueryBuilder
    {
        return new QueryBuilder($this, $this->getQueryGrammar(), $this->getPostProcessor());
    }

    protected function getDefaultQueryGrammar(): Grammar
    {
        return new Grammar();
    }

    public function getQueryGrammar(): Grammar
    {
        /** @var Grammar $grammar */
        $grammar = parent::getQueryGrammar();

        return $grammar;
    }
}
