@extends("general.layout.general")

@section("page-contents")
    <div class="avito_comment-layout-create__container container pt-5">
        <h3 class="avito_comment-layout-create__header text-center pb-4">{{ __("forms.add.comment.header") }}</h3>
        <form class="avito_comment-layout-create__form" method="POST" action="/project/{{ $slug }}/comment" enctype="multipart/form-data">
            @csrf
            <div class="avito_comment-layout-create__form-project-name form-group row">
                <label for="staticProjectName"
                       class="avito_comment-layout-create__form-project-name-label col-sm-2 col-form-label">{{ __("object-names.project.name") }}</label>
                <div class="avito_comment-layout-create__form-project-name-container col-sm-10">
                    <input type="text" readonly class="avito_comment-layout-create__form-project-name-container-input form-control-plaintext" id="staticProjectName"
                           value="{{ $name }}">
                </div>
            </div>

            <div class="avito_comment-layout-create__form-comment form-group">
                <label class="avito_comment-layout-create__form-comment-label" for="textArea">{{ __("object-names.comment.comment") }}</label>
                <textarea class="avito_comment-layout-create__form-comment-input form-control" id="textArea" rows="3" name="comment" required
                          placeholder="{{ __("forms.add.comment.default.comment") }}">{{ old("comment") }}</textarea>
            </div>
            @error("text")
            <p class="avito_comment-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_comment-layout-create__form-comment-attachment form-group">
                <label class="avito_comment-layout-create__form-comment-attachment-label" for="file">{{ __("object-names.comment.attachment") }}</label>
                <input type="file" class="avito_comment-layout-create__form-comment-attachment-input form-control-file" id="file" name="file_name">
            </div>
            @error("file")
            <p class="avito_comment-layout-create__form-error text-danger">{{ $message }}</p>
            @enderror

            <div class="avito_comment-layout-create__form-container-submit text-right">
                <button type="submit" class="avito_comment-layout-create__form-container-button btn btn-primary">{{ __("forms.add.comment.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
