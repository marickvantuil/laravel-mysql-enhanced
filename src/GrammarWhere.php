<?php

declare(strict_types=1);

namespace Marick\LaravelMysqlEnhanced;

use Illuminate\Database\Query\Builder;

trait GrammarWhere
{
    /**
     * Compile a where clause comparing two columns.
     *
     * This method is called for the join compilation to build the join condition clause. To support left lateral joins
     * 'ON true' a special case for the whereColumn needs to be implemented which is never used normally because the
     * generated condition is invalid. Basically the first and second columns are null with an equal operator which
     * would result in a condition like 'ON "" = ""' and is now generated as 'ON true'.
     *
     * @param array $where
     */
    protected function whereColumn(Builder $query, $where): string
    {
        return match ([$where['first'], $where['operator'], $where['second']]) {
            [null, '=', null] => 'true',
            default => parent::whereColumn($query, $where),
        };
    }
}
