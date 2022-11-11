@extends("general.layout.general")

@section("page-contents")
    <div class="avito_project-layout-create__container container mt-5">
        <h3 class="avito_project-layout-create__header text-center pb-4">{{ __("forms.add.project.header") }}</h3>
        <form class="avito_project-layout-create__form" method="POST" action="/project/add">
            @csrf
            <div class="avito_project-layout-create__form-project-name form-group">
                <label class="avito_project-layout-create__form-project-name-label" for="name">{{ __("object-names.project.name") }}</label>
                <input type="text" class="avito_project-layout-create__form-project-name-input form-control" id="name" name="name"
                       placeholder="{{ __("forms.add.project.default.name") }}" value="{{ old("name") }}" required>
            </div>
            @error("name")
            <p class="avito_project-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror
            <div class="avito_project-layout-create__form-description form-group">
                <label class="avito_project-layout-create__form-description-label" for="description">{{ __("object-names.project.description") }}</label>
                <textarea class="avito_project-layout-create__form-description-input form-control" id="description" rows="3" name="description"
                          placeholder="{{ __("forms.add.project.default.description") }}"
                          required>{{ old("description") }}</textarea>
            </div>
            @error("description")
            <p class="avito_project-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror
            <div class="avito_project-layout-create__form-submit text-right">
                <button type="submit" class="avito_project-layout-create__form-submit-button btn btn-primary mb-2">{{ __("forms.add.project.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
