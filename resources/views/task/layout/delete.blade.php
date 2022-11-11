@extends("general.layout.general")

@section("page-contents")
    <div class="avito_task-layout-delete__container container pt-5 mb-3">
        <h3 class="avito_task-layout-delete__header text-center pb-4">{{ __("forms.delete.task.header") }}</h3>
        <form method="POST" action="/task/{{ $task->getSlug() }}/remove" class="avito_task-layout-delete__form form-inline">
            @csrf
            <div class="avito_task-layout-delete__form-container container-fluid px-0">
                <div class="avito_task-layout-delete__form-container-row d-flex flex-row justify-content-center">
                    <button onclick="location.href='/tasks';" class="avito_task-layout-delete__button-button-cancel btn btn-secondary mb-2 mr-2">
                        {{ __("forms.delete.task.cancel") }}</button>
                    <button type="submit" class="avito_task-layout-delete__button-button-create btn btn-danger mb-2">
                        {{ __("forms.delete.task.submit") }}</button>
                </div>
            </div>
        </form>

    </div>
@endsection
