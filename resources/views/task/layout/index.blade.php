@extends("general.layout.general")

@section("page-contents")
    <div class="container pt-5 mb-3">
        <h3 class="text-center pb-2">{{ __("tables.index.task.header") }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th>{{ __("object-names.task.name") }}</th>
                <th>{{ __("object-names.project.project") }}</th>
                <th>{{ __("object-names.user.author") }}</th>
                <th>{{ __("object-names.task.type") }}</th>
                <th>{{ __("object-names.task.state") }}</th>
                <th>{{ __("object-names.task.created") }}</th>
                <th>{{ __("object-names.task.finished") }}</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{ $task->getName() }}</td>
                <td>{{ $task->getProjectName() }}</td>
                <td>{{ $task->getUserName() }}</td>
                <td>
                    <h5>
                            <span class="badge {{ $task->get }}">
                                <i class="fa-solid @include("general.components.badgeTypeIcon", ["type" => $task->getType()])"></i>
                                {{ ucfirst($task->getType()) }}
                            </span>
                    </h5>
                </td>
                <td>
                    <h5>
                        <span class="badge @include("general.components.badgeStateColor", ["state" => $task->getState()])">
                                    <i class="fa-solid @include("general.components.badgeStateIcon", ["state" => $task->getState()])"></i>
                                    {{ ucfirst($task->getState()) }}
                                </span>
                    </h5>
                </td>
                <td>{{ $task->getCreatedAt() }}</td>
                <td>@if($task->getState() == "done" || $task->getState() == "rejected")
                        {{ $task->getUpdatedAt() }}
                    @else
                        {{ "Not finished yet" }}
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="container pt-5 pb-3 mb-3">
        <h3 class="text-center pb-2">{{ __("tables.index.task.task-changes-info") }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{ __("object-names.user.author") }}</th>
                <th scope="col">{{ __("object-names.taskChange.new-state") }}</th>
                <th scope="col">{{ __("object-names.taskChange.created") }}</th>
                <th scope="col">{{ __("object-names.taskChange.comment") }}</th>
            </tr>
            </thead>

            <tbody>

            @foreach($taskChanges as $taskChange)
                <tr>
                    <td>{{ $taskChange->getUserName() }}</td>
                    <td>
                        <h5>
                                <span
                                    class="badge @include("general.components.badgeStateColor", ["state" => $taskChange->getNewState()])">
                                    <i class="fa-solid @include("general.components.badgeStateIcon", ["state" => $taskChange->getNewState()])"></i>
                                    {{ ucfirst($taskChange->getNewState()) }}
                                </span>
                        </h5>
                    </td>
                    <td>
                        {{ $taskChange->getCreatedAt() }}
                    </td>
                    <td>{{ $taskChange->getComment() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
