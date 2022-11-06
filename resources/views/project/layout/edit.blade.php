@extends("general.layout.general")

@section("page-contents")
    <div class="container pt-5 mb-3">
        <h3 class="text-center pb-2">{{ __("forms.edit.project.header") }}</h3>
        <form method="POST" action="/project/{{ $project->getSlug() }}/edit">
            @csrf
            <div class="form-group">
                <label for="name">{{ __("object-names.project.name") }}</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $project->getName() }}" required>
            </div>
            @error("name")
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="description">{{ __("object-names.project.description") }}</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          required>{{ $project->getDescription() }}</textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mb-2">{{ __("forms.edit.project.submit") }}</button>
            </div>
            @error("description")
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </form>
    </div>
@endsection
