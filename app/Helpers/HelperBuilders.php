<?php

/*
 |----------------------------------------------------------------------------------------------------------------------
 | Helpery builderu.
 |----------------------------------------------------------------------------------------------------------------------
 */

namespace App\Helpers;

use App\ProjectSearchQueryBuilder\ProjectSearchQueryBuilderInterface;

if (!function_exists(__NAMESPACE__ . 'projectSearchQueryBuilder')) {
    /**
     * Helper, ktery vraci instanci builderu ProjectSearchQueryBuilder.
     *
     * @return ProjectSearchQueryBuilderInterface
     */
    function projectSearchQueryBuilder(): ProjectSearchQueryBuilderInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(ProjectSearchQueryBuilderInterface::class);
        }

        return $repository;
    }
}
