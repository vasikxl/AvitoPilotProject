@extends("general.layout.general")

@section("page-contents")
    <div class="container mt-5">
        <h3 class="text-center pb-4">{{ __("forms.add.project.header") }}</h3>
        <form method="POST" action="/project/add">
            @csrf
            <div class="form-group">
                <label for="name">{{ __("object-names.project.name") }}</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="{{ __("forms.add.project.default.name") }}" value="{{ old("name") }}" required>
            </div>
            @error("name")
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="description">{{ __("object-names.project.description") }}</label>
                <textarea class="form-control" id="description" rows="3" name="description"
                          placeholder="{{ __("forms.add.project.default.description") }}"
                          required>{{ old("description") }}</textarea>
            </div>
            @error("description")
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="text-right">
                <button type="submit" class="btn btn-primary mb-2">{{ __("forms.add.project.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
