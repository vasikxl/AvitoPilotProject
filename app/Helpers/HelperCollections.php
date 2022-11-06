<?php

/*
 |----------------------------------------------------------------------------------------------------------------------
 | Helpery kolekci.
 |----------------------------------------------------------------------------------------------------------------------
 */

namespace App\Helpers;

use App\ProjectCollection\ProjectCollection;

if (!function_exists(__NAMESPACE__ . 'projectCollection')) {
    /**
     * Helper, ktery vraci instanci kolekce ProjectCollection.
     *
     * @return ProjectCollection
     */
    function projectCollection(): ProjectCollection
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(ProjectCollection::class);
        }

        return $repository;
    }
}
