@extends("general.layout.general")

@section("page-contents")
    <div class="avito_project-layout-delete__container container pt-5 mb-3">
        <h3 class="avito_project-layout-delete__header text-center pb-4">{{ __("forms.delete.project.header") }}</h3>
        <form method="POST" action="/project/{{ $project->getSlug() }}/remove" class="avito_project-layout-delete__form form-inline">
            @csrf
            <div class="avito_project-layout-delete__form-inner-container container-fluid px-0">
                <div class="avito_project-layout-delete__form-inner-container-row d-flex flex-row justify-content-center">
                    <button onclick="location.href='/projects';"
                            class="avito_project-layout-delete__form-cancel-button btn btn-secondary mb-2 mr-2">{{ __("forms.delete.project.cancel") }}</button>
                    <button type="submit" class="avito_project-layout-delete__form-delete-button btn btn-danger mb-2">{{ __("forms.delete.project.submit") }}</button>
                </div>
            </div>
        </form>

    </div>
@endsection
