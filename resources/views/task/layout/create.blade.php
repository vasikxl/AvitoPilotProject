@extends("general.layout.general")

@section("page-contents")
    <div class="avito_task-layout-create__container container mt-5">
        <h3 class="avito_task-layout-create__header text-center pb-4">{{ __("forms.add.task.header") }}</h3>
        <form class="avito_task-layout-create__form" method="POST" action="/task/add">
            @csrf
            <div class="avito_task-layout-create__form-project-name form-group">
                <label for="project_name">{{ __("object-names.project.project") }}</label>
                <select class="form-control" id="project_name" name="project_name" required>
                    @foreach($projectNames as $projectName)
                        <option
                        @if((isset($defaultProject) && $projectName == $defaultProject) || (old("project") == $projectName))
                            {{ "selected='selected'" }}
                            @endif>
                            {{ $projectName }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error("project")
            <p class="avito_task-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_task-layout-create__form-task-name form-group">
                <label for="name">{{ __("object-names.task.name") }}</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="{{ __("forms.add.task.default.name") }}" value="{{ old("name") }}" required>
            </div>
            @error("name")
            <p class="avito_task-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_task-layout-create__form-task-type form-group">
                <label for="type">{{ __("object-names.task.type") }}</label>
                <select class="form-control" id="type" name="type" required>
                    <option selected="selected" disabled>{{ __("forms.add.task.default.type") }}</option>
                    <option @if(old("type") == "Issue")
                        {{ "selected='selected'" }}
                        @endif>Issue
                    </option>
                    <option @if(old("type") == "Request")
                        {{ "selected='selected'" }}
                        @endif>Request
                    </option>
                </select>
            </div>
            @error("type")
            <p class="avito_task-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_task-layout-create__form-button text-right">
                <button type="submit" class="btn btn-primary mb-2">{{ __("forms.add.task.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
