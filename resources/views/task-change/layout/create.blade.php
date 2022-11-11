@extends("general.layout.general")

@section("page-contents")
    <div class="avito_task-change-layout-create__contents-container container mt-5">
        <h3 class="avito_task-change-layout-create__contents-header text-center pb-4">{{ __("forms.add.taskChange.header") }}</h3>
        <form class="avito_task-change-layout-create__contents-form" method="POST" action="/task-change/create">
            @csrf
            <div class="avito_task-change-layout-create__contents-form-project-name form-group">
                <label for="task_name">{{ __("object-names.project.project") }}</label>
                <input class="avito_task-change-layout-create__contents-form-project-name-input form-control" type="text" id="task_name" name="task_name" value="{{ $task->getName() }}"
                       readonly required>
            </div>
            @error("task_name")
            <p class="avito_task-change-layout-create__contents-form-error text-danger">{{ $message }}</p>
            @enderror
            <div class="avito_task-change-layout-create__contents-form-state form-group">
                <label for="new_state">{{ __("object-names.task.state") }}</label>
                <select class="avito_task-change-layout-create__contents-form-state-select form-control" id="new_state" name="new_state" required>
                    <option selected="selected" disabled>{{ __("forms.add.taskChange.default.state") }}</option>
                    <option @if(old("new_state") == "New")
                        {{ "selected='selected'" }}
                        @endif>New
                    </option>
                    <option @if(old("new_state") == "Processing")
                        {{ "selected='selected'" }}
                        @endif>Processing
                    </option>
                    <option @if(old("new_state") == "Done")
                        {{ "selected='selected'" }}
                        @endif>Done
                    </option>
                    <option @if(old("new_state") == "Rejected")
                        {{ "selected='selected'" }}
                        @endif>Rejected
                    </option>
                </select>
            </div>
            @error("new_state")
            <p class="avito_task-change-layout-create__contents-form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_task-change-layout-create-contents-form-comment form-group">
                <label for="comment">{{ __("object-names.comment.comment") }}</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"
                          placeholder="{{ __("forms.add.taskChange.default.comment") }}">{{ old("comment") }}</textarea>
            </div>
            @error("comment")
            <p class="avito_task-change-layout-create__contents-form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_task-change-layout-create-contents-form-button text-right">
                <button type="submit" class="btn btn-primary mb-2">{{ __("forms.add.taskChange.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
