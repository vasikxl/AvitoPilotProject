@extends("general.layout.general")

@section("page-contents")
    <div class="avito_project-layout-index__project-container container pt-5 mb-3">
        <h3 class="avito_project-layout-index__project-header text-center pb-2">{{ __("tables.index.project.header") }}</h3>
        <table class="avito_project-layout-index__project-table table">
            <thead class="avito_project-layout-index__project-table-head">
            <tr class="avito_project-layout-index__project-table-head-row">
                <th class="avito_project-layout-index__project-table-head-row-name">{{ __("object-names.project.name") }}</th>
                <th class="avito_project-layout-index__project-table-head-row-description">{{ __("object-names.project.description") }}</th>
                <th class="avito_project-layout-index__project-table-head-row-user-name">{{ __("object-names.user.author") }}</th>
            </tr>
            </thead>

            <tbody class="avito_project-layout-index__project-table-body">
            <tr class="avito_project-layout-index__project-table-body-row">
                <td class="avito_project-layout-index__project-table-body-row-name">{{ $project->getName() }}</td>
                <td class="avito_project-layout-index__project-table-body-row-description">{{ $project->getDescription() }}</td>
                <td class="avito_project-layout-index__project-table-body-row-user-name">{{ $project->getUserName() }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="avito_project-layout-index__task-container pt-5 pb-3 mb-3">
        <h3 class="avito_project-layout-index__task-header text-center pb-2">
            <th class="avito_project-layout-index__task-header-value">{{ __("tables.index.project.tasks-info") }}</th>
        </h3>
        <table class="avito_project-layout-index__task-table table">
            <thead class="avito_project-layout-index__task-table-head">
            <tr class="avito_project-layout-index__task-table-head-row">
                <th class="avito_project-layout-index__task-table-head-name" scope="col">{{ __("object-names.task.name") }}</th>
                <th class="avito_project-layout-index__task-table-head-type" scope="col">{{ __("object-names.task.type") }}</th>
                <th class="avito_project-layout-index__task-table-head-state" scope="col">{{ __("object-names.task.state") }}</th>
                <th scope="col">&nbsp</th>
            </tr>
            </thead>
            <tbody class="avito_project-layout-index__task-table-body">

            @foreach($tasks as $task)
                <tr class="avito_project-layout-index__task-table-body-row">
                    <td class="avito_project-layout-index__task-table-body-row-name">{{ $task->getName() }}</td>
                    <td class="avito_project-layout-index__task-table-body-row-type">
                        <h5>
                            <span class="badge {{ $task->getTaskTypeBadge() }}">
                                <i class="fa-solid {{ $task->getTaskTypeIcon() }}"></i>
                                {{ ucfirst($task->getType()) }}
                            </span>
                        </h5>
                    </td>
                    <td class="avito_project-layout-index__task-table-body-row-state">
                        <h5>
                            <span
                                class="badge {{ $task->getTaskStateBadge() }}">
                                <i class="fa-solid {{ $task->getTaskStateIcon() }}"></i>
                                {{ ucfirst($task->getState()) }}
                            </span>
                        </h5>
                    </td>
                    <td class="avito_project-layout-index__task-table-body-row-action">
                        <span class="fa-stack fa">
                                    <a href="/task/{{ $task->getSlug() }}/index">
                                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa-solid fa-magnifying-glass-plus fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="avito_project-layout-index__comment-container container pt-5 pb-3 mb-5">
        <h3 class="avito_project-layout-index__comment-header text-center pb-2">{{ __("tables.index.project.comments-info") }}</h3>
        <table class="avito_project-layout-index__comment-table table">
            <thead class="avito_project-layout-index__comment-table-head">
            <tr class="avito_project-layout-index__comment-table-head-row">
                <th class="avito_project-layout-index__comment-table-head-row-comment" scope="col">{{ __("object-names.comment.comment") }}</th>
                <th class="avito_project-layout-index__comment-table-head-row-attachment" scope="col">{{ __("object-names.comment.attachment") }}</th>
                <th class="avito_project-layout-index__comment-table-head-row-user-name" scope="col">{{ __("object-names.user.author") }}</th>
            </tr>
            </thead>

            <tbody class="avito_project-layout-index__comment-table-body">

            @foreach($comments as $comment)
                <tr class="avito_project-layout-index__comment-table-body-row">
                    <td class="avito_project-layout-index__comment-table-body-row-comment">{{ $comment->getComment() }}</td>
                    <td class="avito_project-layout-index__comment-table-body-row-file-path">
                        @if($comment->getFilePath() != "")
                            <a href="/comment/download/{{ $comment->getId() }}">{{ $comment->getFileName() }}</a>
                        @endif
                    </td>sed
                    <td class="avito_project-layout-index__comment-table-body-row-user-name">{{ $comment->getUserName() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
