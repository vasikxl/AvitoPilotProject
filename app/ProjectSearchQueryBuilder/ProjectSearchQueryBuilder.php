<?php

namespace App\ProjectSearchQueryBuilder;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ProjectSearchQueryBuilder implements ProjectSearchQueryBuilderInterface
{
    /**
     * @param array ...$attributes
     *
     * @return Builder
     */
    public static function search(...$attributes) : Builder
    {
        $base = DB::table('projects')
            ->select('projects.name AS projectName', 'projects.description', 'projects.id', 'projects.user_id',
                'projects.slug', 'users.name AS userName', 'projects.created_at', 'projects.updated_at')
            ->join('users', 'projects.user_id', '=', 'users.id');

        if (empty($attributes)) {
            return $base;
        }
        $attributesToSearch = $attributes[0];
        $firstKey = array_key_first($attributesToSearch);
        $base->where("projects.{$firstKey}", 'like', "%{$attributesToSearch[$firstKey]}%");

        foreach ($attributesToSearch as $column => $value) {
            $base->orWhere("projects.$column", 'like', "%$value%");
        }

        return $base;
    }
}
