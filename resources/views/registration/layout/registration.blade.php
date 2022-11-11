@extends("general.layout.general")

@section("page-contents")
    <div class="avito_registration-layout-registration__container pt-5 d-flex flex-row justify-content-center">
        <div class="avito_registration-layout-registration__container-row row justify-content-center">
            <form method="POST" class="avito_registration-layout-registration__form auth-form--width" action="/register">
                @csrf
                <h4 class="avito_registration-layout-registration__form-header mb-4 text-center">{{ __("auth.authPage.promptSignUp") }}</h4>

                <div class="avito_registration-layout-registration__form-name form-outline mb-1">
                    <label class="avito_registration-layout-registration__form-name-label form-label" for="name">{{ __("auth.authPage.name") }}</label>
                    <input type="text" id="name" class="avito_registration-layout-registration__form-name-input form-control" name="name" value="{{ old("name") }}" required/>
                    @error("name")
                    <p class="avito_registration-layout-registration__form-error text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="avito_registration-layout-registration__form-email form-outline mb-1">
                    <label class="avito_registration-layout-registration__form-email-label form-label" for="email">{{ __("auth.authPage.email") }}</label>
                    <input type="email" id="email" class="avito_registration-layout-registration__form-email-input form-control" name="email" value="{{ old("email") }}"
                           required/>
                    @error("email")
                    <p class="avito_registration-layout-registration__form-error text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="avito_registration-layout-registration__form-password form-outline mb-4">
                    <label class="avito_registration-layout-registration__form-password-label form-label" for="password">{{ __("auth.authPage.password") }}</label>
                    <input type="password" id="password" class="avito_registration-layout-registration__form-password-input form-control" name="password" required/>
                    @error("password")
                    <p class="avito_registration-layout-registration__form-error text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="avito_registration-layout-registration__form-button btn btn-primary btn-block my-4">{{ __("auth.authPage.promptSignUp") }}</button>
            </form>
        </div>
    </div>
@endsection

@section("special-includes")
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
@endsection
