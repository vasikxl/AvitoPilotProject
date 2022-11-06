@extends("general.layout.general")

@section("page-contents")
    <div class="container pt-5 mb-3">
        <h3 class="text-center pb-2">{{ __("tables.index.project.header") }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th>{{ __("object-names.project.name") }}</th>
                <th>{{ __("object-names.project.description") }}</th>
                <th>{{ __("object-names.user.author") }}</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{ $project->getName() }}</td>
                <td>{{ $project->getDescription() }}</td>
                <td>{{ $project->getUserName() }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="container pt-5 pb-3 mb-3">
        <h3 class="text-center pb-2">
            <th>{{ __("tables.index.project.tasks-info") }}</th>
        </h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{ __("object-names.task.name") }}</th>
                <th scope="col">{{ __("object-names.task.type") }}</th>
                <th scope="col">{{ __("object-names.task.state") }}</th>
                <th scope="col">&nbsp</th>
            </tr>
            </thead>
            <tbody>

            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <h5>
                            <span class="badge @include("general.components.badgeTypeColor", ["type" => $task->type])">
                                <i class="fa-solid @include("general.components.badgeTypeIcon", ["type" => $task->type])"></i>
                                {{ ucfirst($task->type) }}
                            </span>
                        </h5>
                    </td>
                    <td>
                        <h5>
                            <span
                                class="badge @include("general.components.badgeStateColor", ["state" => $task->state])">
                                <i class="fa-solid @include("general.components.badgeStateIcon", ["state" => $task->state])"></i>
                                {{ ucfirst($task->state) }}
                            </span>
                        </h5>
                    </td>
                    <td>
                        <span class="fa-stack fa">
                                    <a href="/task/{{ $task->slug }}/index">
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

    <div class="container pt-5 pb-3 mb-5">
        <h3 class="text-center pb-2">{{ __("tables.index.project.comments-info") }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{ __("object-names.comment.comment") }}</th>
                <th scope="col">{{ __("object-names.comment.attachment") }}</th>
                <th scope="col">{{ __("object-names.user.author") }}</th>
            </tr>
            </thead>

            <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->getComment() }}</td>
                    <td>
                        @if($comment->getFilePath() != "")
                            <a href="/comment/download/{{ $comment->getId() }}">{{ $comment->getFileName() }}</a>
                        @endif
                    </td>
                    <td>{{ $comment->getUserName() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
