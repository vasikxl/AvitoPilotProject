<div class="container-fluid avito_homepage-components-header__header avito_homepage-components-header__header--background px-0">
    <div class="d-flex flex-row justify-content-between avito_homepage-components-header__header-container avito_homepage-components-header__header-container--padding-bottom">
        <div class="p-2 w-50 avito_homepage-components-header__nav">
            <div class="dropdown show avito_homepage-components-header__nav-dropdown">
                <button class="btn btn-secondary dropdown-toggle avito_homepage-components-header__nav-dropdown-button avito_homepage-components-header__nav-dropdown-button--color" type="button" id="menuDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bars pr-2"></i>
                </button>

                <div class="dropdown-menu avito_homepage-components-header__nav-dropdown-menu" aria-labelledby="menuDropdownMenu">
                    <a class="dropdown-item avito_homepage-components-header__nav-dropdown-menu-item avito_homepage-components-header__nav-dropdown-menu-item--active" href="/">{{ __("object-names.home") }}</a>
                    <a class="dropdown-item avito_homepage-components-header__nav-dropdown-menu-item" href="/users">{{ __("object-names.user.employees") }}</a>
                    <a class="dropdown-item avito_homepage-components-header__nav-dropdown-menu-item" href="/projects">{{ __("object-names.project.projects") }}</a>
                    <a class="dropdown-item avito_homepage-components-header__nav-dropdown-menu-item" href="/tasks">{{ __("object-names.task.tasks") }}</a>
                </div>
            </div>

        </div>
        <div class="w-50 avito_homepage-components-header__logo">
            <img class="img-fluid mx-auto d-block avito_homepage-components-header__logo-img" src="/img/logo.png" onclick="location.href='/';" style="cursor: pointer">
        </div>
        <div class="p-2 w-50 text-right avito_homepage-components-header__session">
            <div class="dropdown avito_homepage-components-header__session-dropdown">
                <button class="btn btn-secondary dropdown-toggle avito_homepage-components-header__session-dropdown-button avito_homepage-components-header__session-dropdown-button--color" type="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(auth()->check()) {{ auth()->user()->name }} @else {{ __("auth.authPage.guest") }} @endif<i class="fa-solid fa-user pl-2"></i>
                </button>
                @if(! auth()->check())
                    <div class="dropdown-menu dropdown-menu-right avito_homepage-components-header__session-dropdown-menu" aria-labelledby="dropdownUser">
                        <a class="dropdown-item avito_homepage-components-header__session-dropdown-menu-item" href="/login">{{ __("auth.authPage.promptLogIn") }}</a>
                        <a class="dropdown-item avito_homepage-components-header__session-dropdown-menu-item" href="/register">{{ __("auth.authPage.promptSignUp") }}</a>
                    </div>
                @else
                    <div class="dropdown-menu dropdown-menu-right avito_homepage-components-header__session-dropdown-menu" aria-labelledby="dropdownUser">
                        <form class="text-center" method="POST" action="/logout">
                            @csrf
                            <a class="dropdown-item avito_dropdown-component-item avito_homepage-components-header__session-dropdown-menu-item" href="/user/{{ auth()->user()->slug }}/index">{{ __("auth.authPage.myAccount") }}</a>
                            <div class="dropdown-divider"></div>
                            <button type="submit" class="btn btn-primary avito_homepage-components-header__session-dropdown-logout-button avito_homepage-components-header__session-dropdown-logout-button--color">{{ __("auth.authPage.logout") }}</button>
                        </form>
                    </div>
                @endif
            </div>

            @if(session()->has("success"))
                <div class="alert alert-success alert-dismissible fade show text-right float-right mt-2 mb-0" role="alert">
                    {{ session("success") }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(session()->has("error"))
                <div class="alert alert-danger alert-dismissible fade show text-right float-right mt-2 mb-0" role="alert">
                    {{ session("error") }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
