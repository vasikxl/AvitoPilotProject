@extends("general.layout.general")

@section("page-contents")
    <div class="pt-5 d-flex flex-row justify-content-center">
        <div class="row justify-content-center">
            <form method="POST" class="auth-form--width" action="/register">
                @csrf
                <h4 class="mb-4 text-center">{{ __("auth.authPage.promptSignUp") }}</h4>

                <div class="form-outline mb-1">
                    <label class="form-label" for="name">{{ __("auth.authPage.name") }}</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ old("name") }}" required/>
                    @error("name")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-outline mb-1">
                    <label class="form-label" for="email">{{ __("auth.authPage.email") }}</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old("email") }}"
                           required/>
                    @error("email")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="password">{{ __("auth.authPage.password") }}</label>
                    <input type="password" id="password" class="form-control" name="password" required/>
                    @error("password")
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block my-4">{{ __("auth.authPage.promptSignUp") }}</button>
            </form>
        </div>
    </div>
@endsection

@section("special-includes")
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
@endsection
