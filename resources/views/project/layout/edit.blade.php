@extends("general.layout.general")

@section("page-contents")
    <div class="avito_project-layout-edit__container container pt-5 mb-3">
        <h3 class="avito_project-layout-edit__header text-center pb-2">{{ __("forms.edit.project.header") }}</h3>
        <form class="avito_project-layout-edit__form" method="POST" action="/project/{{ $project->getSlug() }}/edit">
            @csrf
            <div class="avito_project-layout-edit__form-name form-group">
                <label class="avito_project-layout-edit__form-name-label" for="name">{{ __("object-names.project.name") }}</label>
                <input class="avito_project-layout-edit__form-name-input" type="text" class="form-control" name="name" id="name" value="{{ $project->getName() }}" required>
            </div>
            @error("name")
            <p class="avito_project-layout-edit__form-error text-danger">{{ $message }}</p>
            @enderror
            <div class="avito_project-layout-edit__form-description form-group">
                <label class="avito_project-layout-edit__form-description-label" for="description">{{ __("object-names.project.description") }}</label>
                <textarea class="avito_project-layout-edit__form-description-input form-control" id="description" name="description" rows="3"
                          required>{{ $project->getDescription() }}</textarea>
            </div>
            <div class="avito_project-layout-edit__form-submit text-right">
                <button type="submit" class="avito_project-layout-edit__submit-button btn btn-primary mb-2">{{ __("forms.edit.project.submit") }}</button>
            </div>
            @error("description")
            <p class="avito_project-layout-edit__form-error text-danger">{{ $message }}</p>
            @enderror
        </form>
    </div>
@endsection
