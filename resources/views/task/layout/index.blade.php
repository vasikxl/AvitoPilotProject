@extends("general.layout.general")

@section("page-contents")
    <div class="avito_task-layout-index__container container pt-5 mb-3">
        <h3 class="avito_task-layout-index__header text-center pb-2">{{ __("tables.index.task.header") }}</h3>
        <table class="avito_task-layout-index__table-task table">
            <thead class="avito_task-layout-index__table-task-head">
            <tr class="avito_task-layout-index__table-task-head-row">
                <th class="avito_task-layout-index__table-task-head-name">{{ __("object-names.task.name") }}</th>
                <th class="avito_task-layout-index__table-task-head-project-name">{{ __("object-names.project.project") }}</th>
                <th class="avito_task-layout-index__table-task-head-user-name">{{ __("object-names.user.author") }}</th>
                <th class="avito_task-layout-index__table-task-head-type">{{ __("object-names.task.type") }}</th>
                <th class="avito_task-layout-index__table-task-head-state">{{ __("object-names.task.state") }}</th>
                <th class="avito_task-layout-index__table-task-head-created">{{ __("object-names.task.created") }}</th>
                <th class="avito_task-layout-index__table-task-head-finished">{{ __("object-names.task.finished") }}</th>
            </tr>
            </thead>

            <tbody class="avito_task-layout-index__table-task-body">
            <tr>
                <td class="avito_task-layout-index__table-task-body-name">{{ $task->getName() }}</td>
                <td class="avito_task-layout-index__table-task-body-project-name">{{ $task->getProjectName() }}</td>
                <td class="avito_task-layout-index__table-task-body-user-name">{{ $task->getUserName() }}</td>
                <td class="avito_task-layout-index__table-task-body-type">
                    <h5>
                            <span class="badge {{ $task->getTaskTypeBadge() }}">
                                <i class="fa-solid {{ $task->getTaskTypeIcon() }}"></i>
                                {{ ucfirst($task->getType()) }}
                            </span>
                    </h5>
                </td>
                <td class="avito_task-layout-index__table-task-body-state">
                    <h5>
                        <span class="badge {{ $task->getTaskStateBadge() }}">
                                    <i class="fa-solid {{ $task->getTaskStateIcon() }}"></i>
                                    {{ ucfirst($task->getState()) }}
                                </span>
                    </h5>
                </td>
                <td class="avito_task-layout-index__table-task-body-created_at">{{ $task->getCreatedAt() }}</td>
                <td class="avito_task-layout-index__table-task-body-updated_at">@if($task->getState() == "done" || $task->getState() == "rejected")
                        {{ $task->getUpdatedAt() }}
                    @else
                        {{ "Not finished yet" }}
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="avito_task-layout-index__container-task-changes container pt-5 pb-3 mb-3">
        <h3 class="avito_task-layout-index__header-task-changes text-center pb-2">{{ __("tables.index.task.task-changes-info") }}</h3>
        <table class="avito_task-layout-index__table-task-changes table">
            <thead class="avito_task-layout-index__table-task-changes-head">
            <tr class="avito_task-layout-index__table-task-changes-head-row">
                <th class="avito_task-layout-index__table-task-changes-head-author" scope="col">{{ __("object-names.user.author") }}</th>
                <th class="avito_task-layout-index__table-task-changes-head-state" scope="col">{{ __("object-names.taskChange.new-state") }}</th>
                <th class="avito_task-layout-index__table-task-changes-head-created" scope="col">{{ __("object-names.taskChange.created") }}</th>
                <th class="avito_task-layout-index__table-task-changes-head-comment" scope="col">{{ __("object-names.taskChange.comment") }}</th>
            </tr>
            </thead>

            <tbody class="avito_task-layout-index__table-task-changes-body">

            @foreach($taskChanges as $taskChange)
                <tr class="avito_task-layout-index__table-task-changes-body-row">
                    <td class="avito_task-layout-index__table-task-changes-body-row-user-name">{{ $taskChange->getUserName() }}</td>
                    <td class="avito_task-layout-index__table-task-changes-body-row-state">
                        <h5>
                                <span
                                    class="badge @include("general.components.badgeStateColor", ["state" => $taskChange->getNewState()])">
                                    <i class="fa-solid @include("general.components.badgeStateIcon", ["state" => $taskChange->getNewState()])"></i>
                                    {{ ucfirst($taskChange->getNewState()) }}
                                </span>
                        </h5>
                    </td>
                    <td class="avito_task-layout-index__table-task-changes-body-row-created_at">
                        {{ $taskChange->getCreatedAt() }}
                    </td>
                    <td class="avito_task-layout-index__table-task-changes-body-row-comment">{{ $taskChange->getComment() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
