<?php

declare(strict_types=1);

namespace Marick\LaravelMysqlEnhanced;

use Illuminate\Database\Query\Grammars\MySqlGrammar;

class Grammar extends MySqlGrammar
{
    use GrammarWhere;
}
