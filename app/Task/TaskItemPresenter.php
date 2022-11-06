<?php

namespace App\Task;

class TaskItemPresenter implements TaskItemPresenterInterface
{
    /**
     * Vraci tridu badge, ktera se pouziva dle typu ukolu.
     *
     * @return string
     */
    public static function getTaskTypeBadge(string $type) : string
    {
        return match ($type) {
            'request' => 'badge-secondary',
            default => 'badge-warning',
        };
    }

    /**
     * Vraci tridu badge, ktera se pouziva dle stavu ukolu.
     *
     * @return string
     */
    public static function getTaskStateBadge(string $state) : string
    {
        return match ($state) {
            'new' => 'badge-primary',
            'processing' => 'badge-info',
            'done' => 'badge-success',
            default => 'badge-danger',
        };
    }

    /**
     * Vraci ikonu, ktera se pouziva dle typu ukolu.
     *
     * @return string
     */
    public static function getTaskTypeIcon(string $type): string
    {
        return match ($type) {
            'request' => 'fa-code-pull-request',
            default => 'fa-triangle-exclamation',
        };
    }

    /**
     * Vraci ikonu, ktera se pouziva dle stavu ukolu.
     *
     * @return string
     */
    public static function getTaskStateIcon(string $state): string
    {
        return match ($state) {
            'new' => 'fa-file-lines',
            'processing' => 'fa-gear',
            'done' => 'fa-check',
            default => 'fa-xmark',
        };
    }

    /**
     * Vraci finished at udaj ukolu.
     *
     * @return string
     */
    public static function getTaskFinishedAt(string $state, string $updatedAt): string
    {
        return match ($state) {
            'rejected', 'done' => $updatedAt,
            default => 'Not finished yet',
        };
    }
}
