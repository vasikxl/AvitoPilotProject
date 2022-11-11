@extends("general.layout.general")

@section("page-contents")
    <div class="avito_notified-users-layout-create__container container pt-5 mb-3">
        <h3 class="avito_notified-users-layout-create__header text-center pb-4">{{ __("forms.add.notification.header") }}</h3>
        <form class="avito_notified-users-layout-create__form" method="POST" action="/notified-users/{{ $project->getSlug() }}/create" class="form-inline">
            @csrf
            <div class="avito_notified-users-layout-create__form-inner-container container-fluid px-0">
                <div class="avito_notified-users-layout-create__form-inner-container-row d-flex flex-row justify-content-center">
                    <button onclick="location.href='/projects';"
                            class="avito_notified-users-layout-create__form-cancel-button btn btn-secondary mb-2 mr-2">{{ __("forms.add.notification.cancel") }}</button>
                    <button type="submit" class="avito_notified-users-layout-create__form-submit-button btn btn-danger mb-2">{{ __("forms.add.notification.submit") }}</button>
                </div>
            </div>
        </form>

    </div>
@endsection
