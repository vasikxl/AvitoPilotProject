<table class="avito_task-components-overview-table__table table table--projects">
    <thead class="avito_task-components-overview-table__table-head">
    <tr class="avito_task-components-overview-table__table-head-row">
        <th class="avito_task-components-overview-table__table-head-row-name" scope="col" style="width:20%;">{{ __("object-names.task.name") }}</th>
        <th class="avito_task-components-overview-table__table-head-row-project-name" style="width:15%;" scope="col">{{ __("object-names.project.project") }}</th>
        <th class="avito_task-components-overview-table__table-head-row-user-name" scope="col">{{ __("object-names.user.author") }}</th>
        <th class="avito_task-components-overview-table__table-head-row-type" scope="col">{{ __("object-names.task.type") }}</th>
        <th class="avito_task-components-overview-table__table-head-row-state" scope="col">{{ __("object-names.task.state") }}</th>
        <th class="avito_task-components-overview-table__table-head-row-created" scope="col">{{ __("object-names.task.created") }}</th>
        <th class="avito_task-components-overview-table__table-head-row-finished" scope="col">{{ __("object-names.task.finished") }}</th>
        <th scope="col">&nbsp</th>
    </tr>
    </thead>
    <tbody class="avito_task-components-overview-table__table-body">
    @foreach($tasks as $task)
        <tr class="avito_task-components-overview-table__table-body-row">
            <th class="avito_task-components-overview-table__table-body-name align-middle" scope="row">{{ $task->getName() }}</th>
            <td class="avito_task-components-overview-table__table-body-project-name align-middle">{{ $task->getProjectName() }}</td>
            <td class="avito_task-components-overview-table__table-body-user-name align-middle">{{ $task->getUserName() }}</td>
            <td class="avito_task-components-overview-table__table-body-type align-middle">
                <h5>
                        <span class="badge {{ $task->getTaskTypeBadge() }}">
                            <i class="fa-solid {{ $task->getTaskTypeIcon() }}"></i>
                            {{ ucfirst($task->getType()) }}
                        </span>
                </h5>
            </td>
            <td class="avito_task-components-overview-table__table-body-state align-middle">
                <h5>
                        <span class="badge {{ $task->getTaskStateBadge() }}">
                            <i class="fa-solid {{ $task->getTaskStateIcon() }}"></i>
                            {{ ucfirst($task->getState()) }}
                        </span>
                </h5>
            </td>
            <td class="avito_task-components-overview-table__table-body-created-at align-middle">
                {{ $task->getCreatedAt() }}
            </td>
            <td class="avito_task-components-overview-table__table-body-finished-at align-middle">
                {{ $task->getTaskFinishedAt() }}
            </td>

            <td class="avito_task-components-overview-table__table-body-action text-right align-middle" style="width:18%;">
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
