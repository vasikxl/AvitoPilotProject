<table class="table table--projects">
    <thead>
    <tr>
        <th scope="col" style="width:20%;">{{ __("object-names.task.name") }}</th>
        <th style="width:15%;" scope="col">{{ __("object-names.project.project") }}</th>
        <th scope="col">{{ __("object-names.user.author") }}</th>
        <th scope="col">{{ __("object-names.task.type") }}</th>
        <th scope="col">{{ __("object-names.task.state") }}</th>
        <th scope="col">{{ __("object-names.task.created") }}</th>
        <th scope="col">{{ __("object-names.task.finished") }}</th>
        <th scope="col">&nbsp</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <th class="align-middle" scope="row">{{ $task->getName() }}</th>
            <td class="align-middle">{{ $task->getProjectName() }}</td>
            <td class="align-middle">{{ $task->getUserName() }}</td>
            <td class="align-middle">
                <h5>
                        <span class="badge {{ $task->getTaskTypeBadge() }}">
                            <i class="fa-solid {{ $task->getTaskTypeIcon() }}"></i>
                            {{ ucfirst($task->getType()) }}
                        </span>
                </h5>
            </td>
            <td class="align-middle">
                <h5>
                        <span class="badge {{ $task->getTaskStateBadge() }}">
                            <i class="fa-solid {{ $task->getTaskStateIcon() }}"></i>
                            {{ ucfirst($task->getState()) }}
                        </span>
                </h5>
            </td>
            <td class="align-middle">
                {{ $task->getCreatedAt() }}
            </td>
            <td class="align-middle">
                {{ $task->getTaskFinishedAt() }}
            </td>

            <td class="text-right align-middle" style="width:18%;">
                                <span class="fa-stack fa">
                                    <a href="/task/{{ $task->getSlug() }}/index">
                                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa-solid fa-magnifying-glass-plus fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>

                <span class="fa-stack fa">
                                    <a href="/task-change/{{ $task->getSlug() }}/create">
                                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa-solid fa-code-commit fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>

                <span class="fa-stack fa">
                                    <a href="/task/{{ $task->getSlug() }}/edit">
                                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                        <i class="fa-solid fa-pencil fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>

                <span class="fa-stack fa">
                                    <a href="/task/{{ $task->getSlug() }}/remove">
                                        <i class="fa-solid fa-square fa-stack-2x text-danger"></i>
                                        <i class="fa-solid fa-trash fa-stack-1x fa-inverse"></i>
                                    </a>
                                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
