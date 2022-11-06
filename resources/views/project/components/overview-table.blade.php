<table class="table table--projects">
    <thead>
    <tr>
        <th scope="col">{{ __("object-names.project.name") }}</th>
        <th scope="col">{{ __("object-names.project.description") }}</th>
        <th scope="col">{{ __("object-names.user.author") }}</th>
        <th scope="col">{{ __("object-names.task.types.issues") }}</th>
        <th scope="col">{{ __("object-names.task.types.requests") }}</th>

        <th style="width:25%" scope="col">&nbsp</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <th class="align-middle" scope="row">{{ $project->getName() }}</th>
            <td class="align-middle">{{ $project->getDescription() }}</td>
            <td class="align-middle">{{ $project->getUserName() }}</td>

            @foreach($projectsToTasks as $projectToTask)
                @if($projectToTask['projectId'] == $project->getId())
                    <td class="align-middle">
                        @if(isset($projectToTask["issue"]))
                            @foreach($projectToTask["issue"] as $state => $count)
                                @if($count != 0)
                                    <span
                                        class="badge @include("general.components.badgeStateColor", ["state" => $state])">{{ ucfirst($state) }}
                                        <span class="badge badge-light">{{ $count }}</span>
                                    </span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td class="align-middle">
                        @if(isset($projectToTask["request"]))
                            @foreach($projectToTask["request"] as $state => $count)
                                @if($count != 0)
                                    <span
                                        class="badge @include("general.components.badgeStateColor", ["state" => $state])">{{ ucfirst($state) }}
                                        <span class="badge badge-light">{{ $count }}</span>
                                    </span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                @endif
            @endforeach

            <td class="text-right align-middle">
                <span class="fa-stack fa">
                    <a href="/project/{{ $project->getSlug() }}/index">
                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-magnifying-glass-plus fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa">
                    <a href="/project/{{ $project->getSlug() }}/comment">
                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-comment fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa">
                    <a href="/notified-users/{{ $project->getSlug() }}/create">
                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-envelope fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa">
                    <a href="/task/{{ $project->getSlug() }}/add">
                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-bars-staggered fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa">
                    <a href="/project/{{ $project->getSlug() }}/edit">
                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-pencil fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa">
                    <a href="/project/{{ $project->getSlug() }}/remove">
                        <i class="fa-solid fa-square fa-stack-2x text-danger"></i>
                        <i class="fa-solid fa-trash fa-stack-1x fa-inverse"></i>
                    </a>
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
