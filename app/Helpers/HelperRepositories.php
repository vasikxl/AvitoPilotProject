<?php

/*
 |----------------------------------------------------------------------------------------------------------------------
 | Helpery repositaru.
 |----------------------------------------------------------------------------------------------------------------------
 */

namespace App\Helpers;

use App\Comment\CommentRepositoryInterface;
use App\NotifiedUsers\NotifiedUserRepositoryInterface;
use App\Project\ProjectRepositoryInterface;
use App\Task\TaskRepositoryInterface;
use App\TaskChange\TaskChangeRepositoryInterface;
use App\User\UserRepositoryInterface;

if (!function_exists(__NAMESPACE__ . 'projectRepository')) {
    /**
     * Helper, ktery vraci instanci repositare projectRepository.
     *
     * @return ProjectRepositoryInterface
     */
    function projectRepository(): ProjectRepositoryInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(ProjectRepositoryInterface::class);
        }

        return $repository;
    }
}

if (!function_exists(__NAMESPACE__ . 'taskRepository')) {
    /**
     * Helper, ktery vraci instanci repositare taskRepository.
     *
     * @return TaskRepositoryInterface
     */
    function taskRepository(): TaskRepositoryInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(TaskRepositoryInterface::class);
        }

        return $repository;
    }
}

if (!function_exists(__NAMESPACE__ . 'userRepository')) {
    /**
     * Helper, ktery vraci instanci repositare userRepository.
     *
     * @return UserRepositoryInterface
     */
    function userRepository(): UserRepositoryInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(UserRepositoryInterface::class);
        }

        return $repository;
    }
}

if (!function_exists(__NAMESPACE__ . 'taskChangeRepository')) {
    /**
     * Helper, ktery vraci instanci repositare taskChangeRepository.
     *
     * @return taskChangeRepositoryInterface
     */
    function taskChangeRepository(): taskChangeRepositoryInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(taskChangeRepositoryInterface::class);
        }

        return $repository;
    }
}

if (!function_exists(__NAMESPACE__ . 'commentRepository')) {
    /**
     * Helper, ktery vraci instanci repositare commentRepository.
     *
     * @return commentRepositoryInterface
     */
    function commentRepository(): commentRepositoryInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(commentRepositoryInterface::class);
        }

        return $repository;
    }
}

if (!function_exists(__NAMESPACE__ . 'notifiedUsersRepository')) {
    /**
     * Helper, ktery vraci instanci repositare notifiedUsersRepository.
     *
     * @return NotifiedUserRepositoryInterface
     */
    function notifiedUsersRepository(): NotifiedUserRepositoryInterface
    {
        static $repository = null;

        if (null === $repository) {
            $repository = app(NotifiedUserRepositoryInterface::class);
        }

        return $repository;
    }
}
