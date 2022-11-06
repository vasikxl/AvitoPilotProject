@extends("general.layout.general")
@section("page-contents")
    <div class="pt-5 d-flex flex-row justify-content-center">
        <div class="row justify-content-center">
            <form method="POST" class="auth-form--width" action="/login">
                @csrf
                <h4 class="mb-4 text-center">{{ __("auth.authPage.promptLogIn") }}</h4>

                <div class="form-outline mb-1">
                    <label class="form-label" for="email">{{ __("auth.authPage.email") }}</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old("email") }}"
                           required/>
                </div>
                @error("email")
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-outline mb-4">
                    <label class="form-label" for="password">{{ __("auth.authPage.password") }}</label>
                    <input type="password" id="password" class="form-control" name="password" required/>
                </div>

                <a class="text-primary" href="/register">{{ __("auth.authPage.goToSignUp") }}</a>

                <button type="submit"
                        class="btn btn-primary btn-block mt-3">{{ __("auth.authPage.promptLogIn") }}</button>
            </form>
        </div>
    </div>
@endsection

@section("special-includes")
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
@endsection
