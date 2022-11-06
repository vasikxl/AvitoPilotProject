@extends("general.layout.general")

@section("page-contents")
    <div class="container pt-5 mb-3">
        <h3 class="text-center pb-2">{{ __("forms.edit.task.header") }}</h3>
        <form method="POST" action="/task/{{ $task->getSlug() }}/edit">
            @csrf
            <div class="form-group">
                <label for="name">{{ __("object-names.task.name") }}</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $task->getName() }}">
            </div>
            @error("name")
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-group">
                <label for="type">{{ __("object-names.task.type") }}</label>
                <select class="form-control" id="type" name="type">
                    <option @if($task->getType() == "issue")
                        {{ "selected='selected" }}
                        @endif>Issue
                    </option>
                    <option @if($task->getType() == "request")
                        {{ "selected='selected" }}
                        @endif>Request
                    </option>
                </select>
            </div>
            @error("type")
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-group">
                <label for="state">{{ __("object-names.task.state") }}</label>
                <select class="form-control" id="state" name="state">
                    <option @if($task->getState() == "new")
                        {{ "selected='selected" }}
                        @endif>New
                    </option>
                    <option @if($task->getState() == "processing")
                        {{ "selected='selected" }}
                        @endif>Processing
                    </option>
                    <option @if($task->getState() == "done")
                        {{ "selected='selected" }}
                        @endif>Done
                    </option>
                    <option @if($task->getState() == "rejected")
                        {{ "selected='selected" }}
                        @endif>Rejected
                    </option>
                </select>
            </div>
            @error("state")
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="text-right">
                <button type="submit" class="btn btn-primary mb-2">{{ __("forms.edit.task.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
