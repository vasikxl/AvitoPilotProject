@extends("general.layout.general")

@section("page-contents")
    <div class="container pt-5 mb-3">
        <h3 class="text-center pb-4">{{ __("forms.delete.project.header") }}</h3>
        <form method="POST" action="/project/{{ $project->getSlug() }}/remove" class="form-inline">
            @csrf
            <div class="container-fluid px-0">
                <div class="d-flex flex-row justify-content-center">
                    <button onclick="location.href='/projects';"
                            class="btn btn-secondary mb-2 mr-2">{{ __("forms.delete.project.cancel") }}</button>
                    <button type="submit" class="btn btn-danger mb-2">{{ __("forms.delete.project.submit") }}</button>
                </div>
            </div>
        </form>

    </div>
@endsection
