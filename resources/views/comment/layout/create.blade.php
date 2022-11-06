@extends("general.layout.general")

@section("page-contents")
    <div class="container pt-5">
        <h3 class="text-center pb-4">{{ __("forms.add.comment.header") }}</h3>
        <form method="POST" action="/project/{{ $slug }}/comment" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="staticProjectName"
                       class="col-sm-2 col-form-label">{{ __("object-names.project.name") }}</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticProjectName"
                           value="{{ $name }}">
                </div>
            </div>

            <div class="form-group">
                <label for="textArea">{{ __("object-names.comment.comment") }}</label>
                <textarea class="form-control" id="textArea" rows="3" name="comment" required
                          placeholder="{{ __("forms.add.comment.default.comment") }}">{{ old("comment") }}</textarea>
            </div>
            @error("text")
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="form-group">
                <label for="file">{{ __("object-names.comment.attachment") }}</label>
                <input type="file" class="form-control-file" id="file" name="file_name">
            </div>
            @error("file")
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="text-right">
                <button type="submit" class="btn btn-primary">{{ __("forms.add.comment.submit") }}</button>
            </div>
        </form>
    </div>
@endsection
