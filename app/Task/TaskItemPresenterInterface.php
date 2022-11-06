<?php

namespace App\Task;

interface TaskItemPresenterInterface
{
    public static function getTaskTypeBadge(string $type) : string;
    public static function getTaskStateBadge(string $state) : string;
    public static function getTaskTypeIcon(string $type) : string;
    public static function getTaskStateIcon(string $state) : string;
    public static function getTaskFinishedAt(string $state, string $updatedAt) : string;
}
