<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Urcuje, zda-li muze uzivatel dle id muze editovat projekt dle id.
     *
     * @param int $userIdUser
     * @param int $userIdProject
     * @return bool
     */
    public function update(int $userIdUser, int $userIdProject) : bool
    {
        ddd("haha");
        return $userIdUser === $userIdProject;
    }

    /**
     * Urcuje, zda-li muze uzivatel dle id mazat projekt dle id.
     *
     * @param int $userIdUser
     * @param int $userIdProject
     * @return bool
     */
    public function delete(int $userIdUser, int $userIdProject) : bool
    {
        return $userIdUser === $userIdProject;
    }

}
