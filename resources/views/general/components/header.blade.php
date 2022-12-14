<div class="avito_general-components-header__container--background container-fluid avito_general-component-header__background avito_homepage-component-header__padding px-0">
    <div class="avito_general-components-header__container-row d-flex flex-row justify-content-between">
        <div class="avito_general-components-header__nav p-2 w-50">
            <div class="avito_general-components-header__nav-dropdown dropdown show">
                <button class="avito_general-components-header__nav-dropdown-button avito_general-components-header__nav-dropdown-button--color btn btn-secondary dropdown-toggle avito_general-component-nav__color" type="button" id="menuDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bars pr-2"></i>
                </button>

                <div class="avito_general-components-header__nav-dropdown-menu dropdown-menu" aria-labelledby="menuDropdownMenu">
                    <a class="avito_general-components-header__nav-dropdown-menu-item dropdown-item avito_dropdown-component-item" href="/">{{ __("object-names.home") }}</a>
                    <a class="avito_general-components-header__nav-dropdown-menu-item dropdown-item avito_dropdown-component-item" href="/users">{{ __("object-names.user.employees") }}</a>
                    <a class="avito_general-components-header__nav-dropdown-menu-item dropdown-item avito_general-components-header__dropdown-menu-item" href="/projects">{{ __("object-names.project.projects") }}</a>
                    <a class="avito_general-components-header__nav-dropdown-menu-item dropdown-item avito_dropdown-component-item" href="/tasks">{{ __("object-names.task.tasks") }}</a>
                </div>
            </div>

        </div>
        <div class="avito_general-components-header__logo w-50">
            <img class="avito_general-components-header__logo-img img-fluid mx-auto d-block" src="/img/logo_medium.png" onclick="location.href='/';" style="cursor: pointer">
        </div>
        <div class="avito_general-components-header__user p-2 w-50 text-right">
            <div class="avito_general-components-header__user-dropdown dropdown">
                <button class="avito_general-components-header__user-dropdown-button avito_general-components-header__user-dropdown-button--color btn btn-secondary dropdown-toggle avito_general-component-nav__color" type="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(auth()->check()) {{ auth()->user()->name }} @else {{ __("auth.authPage.guest") }} @endif<i class="fa-solid fa-user pl-2"></i>
                </button>
                @if(! auth()->check())
                    <div class="avito_general-components-header__user-dropdown-menu-guest dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownUser">
                        <a class="avito_general-components-header__dropdown-menu-guest-item avito_dropdown-component-item" href="/login">{{ __("auth.authPage.promptLogIn") }}</a>
                        <a class="avito_general-components-header__dropdown-menu-guest-item avito_dropdown-component-item" href="/register">{{ __("auth.authPage.promptSignUp") }}</a>
                    </div>
                @else
                    <div class="avito_general-components-header__dropdown-menu-logged dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser">
                        <form class="avito_general-components-header__dropdown-menu-logged-form text-center" method="POST" action="/logout">
                            @csrf
                            <a class="avito_general-components-header__dropdown-menu-logged-form-user-info avito_dropdown-component-item dropdown-item" href="/user/{{ auth()->user()->slug }}/index">{{ __("auth.authPage.myAccount") }}</a>
                            <div class="avito_general-components-header__dropdown-menu-logged-form-divider dropdown-divider"></div>
                            <button type="submit" class="avito_general-components-header__dropdown-menu-logged-form-submit avito_general-components-header__dropdown-menu-logged-form-submit--color btn btn-primary avito_general-component-nav__color">{{ __("auth.authPage.logout") }}</button>
                        </form>
                    </div>
                @endif
            </div>

            @if(session()->has("success"))
                <div class="avito_general-components-header__form-success alert alert-success alert-dismissible fade show text-right float-right mt-2 mb-0" role="alert">
                    {{ session("success") }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session()->has("error"))
                <div class="avito_general-components-header__form-error alert alert-danger alert-dismissible fade show text-right float-right mt-2 mb-0" role="alert">
                    {{ session("error") }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
