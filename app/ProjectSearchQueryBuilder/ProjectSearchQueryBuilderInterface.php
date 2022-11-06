<?php

namespace App\ProjectSearchQueryBuilder;

use Illuminate\Database\Query\Builder;

interface ProjectSearchQueryBuilderInterface
{
    public static function search(...$attributes) : Builder;
}
