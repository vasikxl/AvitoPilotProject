@extends("general.layout.general")
@section("page-contents")
    <div class="avito_sessions-layout-login__container pt-5 d-flex flex-row justify-content-center">
        <div class="avito_sessions-layout-login__container-row row justify-content-center">
            <form method="POST" class="avito_sessions-layout-login__form auth-form--width" action="/login">
                @csrf
                <h4 class="avito_sessions-layout-login__form-header mb-4 text-center">{{ __("auth.authPage.promptLogIn") }}</h4>

                <div class="avito_sessions-layout-login__form-email form-outline mb-1">
                    <label class="avito_sessions-layout-login__form-email-label form-label" for="email">{{ __("auth.authPage.email") }}</label>
                    <input type="email" id="email" class="avito_sessions-layout-login__form-email-input form-control" name="email" value="{{ old("email") }}"
                           required/>
                </div>
                @error("email")
                <p class="avito_sessions-layout-login__form-error text-danger">{{ $message }}</p>
                @enderror

                <div class="avito_sessions-layout-login__form-password form-outline mb-4">
                    <label class="avito_sessions-layout-login__form-password-label form-label" for="password">{{ __("auth.authPage.password") }}</label>
                    <input type="password" id="password" class="avito_sessions-layout-login__form-password-input form-control" name="password" required/>
                </div>

                <a class="avito_sessions-layout-login__form-redirect-register text-primary" href="/register">{{ __("auth.authPage.goToSignUp") }}</a>

                <button type="submit"
                        class="avito_sessions-layout-login__form-submit btn btn-primary btn-block mt-3">{{ __("auth.authPage.promptLogIn") }}</button>
            </form>
        </div>
    </div>
@endsection

@section("special-includes")
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
@endsection
