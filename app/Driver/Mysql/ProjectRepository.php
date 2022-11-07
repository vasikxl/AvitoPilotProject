<?php

namespace App\Driver\Mysql;

use App\Project\Exception\NoSuchProjectException;
use App\Project\ProjectRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function App\Helpers\projectSearchQueryBuilder;

/**
 * Driver pro práci s projektovou databází.
 *
 * Zdroje:
 *  - Třída používá databází projektů a uživatelů
 *
 * Optimalizace:
 *  - Třída využívá cachování
 */
class ProjectRepository implements ProjectRepositoryInterface {

    /**
     * Vraci projekt dle slugu.
     *
     * @param String $slug
     *
     * @return ProjectItem
     */
    public function getProjectBySlug(String $slug) : ProjectItem {
        $key = "projectItem:{$slug}";
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $project = DB::table('projects')
            ->where('projects.slug', '=', $slug)
            ->select('projects.name', 'projects.slug', 'projects.description', 'projects.id', 'projects.user_id',
                'users.name AS userName', 'projects.created_at', 'projects.updated_at')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->get()->first();

        $projectItem = new ProjectItem($project->id, $project->user_id, $project->slug, $project->name, $project->description,
            $project->userName, $project->created_at, $project->updated_at);
        Cache::add($key, $projectItem, Carbon::now()->addSeconds(3));
        return $projectItem;
    }

    /**
     * Vraci projekt dle jmena projektu.
     *
     * @param String $name
     * @return ProjectItem
     * @throws NoSuchProjectException
     */
    public function getProjectByName(String $name) : ProjectItem {
        $project = DB::table('projects')
            ->where('projects.name', '=', $name)
            ->select('projects.name', 'projects.slug', 'projects.description', 'projects.id', 'projects.user_id',
                'users.name AS userName', 'projects.created_at', 'projects.updated_at')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->get();
        if ($project->count() == 0) {
            throw new NoSuchProjectException();
        }

        return new ProjectItem($project->id, $project->user_id, $project->slug, $project->name, $project->description,
            $project->userName, $project->created_at, $project->updated_at);
    }

    /**
     * Vraci paginaci vsech projektu.
     *
     * @return LengthAwarePaginator
     */
    public function getAllProjectsPaginated() : LengthAwarePaginator {
        $projects = DB::table('projects')
            ->select('projects.name AS projectName', 'projects.description', 'projects.id', 'projects.user_id',
                'projects.slug', 'users.name AS userName', 'projects.created_at', 'projects.updated_at')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->paginate();

        $projects->getCollection()->transform(function ($project) {
            return new ProjectItem($project->id, $project->user_id, $project->slug, $project->projectName, $project->description,
                $project->userName, $project->created_at, $project->updated_at);
        });
        return $projects;
    }

    /**
     * Ziska vsechny projekty dle jmena, popisu projektu nebo dle jmena autora.
     *
     * @param String $name
     * @return LengthAwarePaginator[ProjectItem]
     */
    public function getAllProjectsByName(String $name) : LengthAwarePaginator
    {
        $projects = projectSearchQueryBuilder()->search([
                'name' => $name,
                'description' => $name])
            ->paginate();

        $projects->getCollection()->transform(function ($project) {
            return new ProjectItem($project->id, $project->user_id, $project->slug, $project->projectName, $project->description,
                $project->userName, $project->created_at, $project->updated_at);
        });
        return $projects;
    }

    /**
     * Vytvori novy zaznam v tabulce projektu.
     *
     * @param String $name
     * @param String $description
     * @param int $userId
     *
     * @return void
     */
    public function store(String $name, String $description, int $userId) : void {
        $attributes = [
            'name' => $name,
            'description' => $description,
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $attributes['slug'] = Str::slug($attributes['name']);
        DB::table('projects')
            ->insert($attributes);
    }

    /**
     * Aktualizuje zaznam v tabulce projektu dle id.
     *
     * @param int $projectId
     * @param String $name
     * @param String $description
     * @return void
     */
    public function update(int $projectId, String $name, String $description) : void {
        DB::table('projects')
            ->where('id', $projectId)
            ->update([
                "name" => $name,
                "description" => $description,
                "updated_at" => now()
            ]);
    }

    /**
     * Smaze zaznam z tabulky projektu dle id.
     *
     * @param int $projectId
     * @return void
     */
    public function delete(int $projectId) : void {
        DB::table('projects')
            ->where('id', $projectId)
            ->delete();
    }

    /**
     * @return Collection
     */
    public function getAllProjects(): Collection
    {
        $projects = DB::table('projects')
            ->select('projects.name AS projectName', 'projects.description', 'projects.id', 'projects.user_id',
                'projects.slug', 'users.name AS userName', 'projects.created_at', 'projects.updated_at')
            ->join('users', 'projects.user_id', '=', 'users.id')
            ->get();

        return $projects->map(function ($project) {
            return new ProjectItem($project->id, $project->user_id, $project->slug, $project->projectName, $project->description,
                $project->userName, $project->created_at, $project->updated_at);
        });
    }
}

