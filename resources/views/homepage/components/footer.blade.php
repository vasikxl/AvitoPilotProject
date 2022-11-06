<footer>
    <div class="container-fluid pr-0 avito_homepage-components-footer__footer avito_homepage-components-footer__footer--background">
        <div class="d-flex flex-row justify-content-between">
            <div class="w-50">
                <div class="container-fluid px-0 avito_homepage-components-footer__copyright-container">
                    <div class="d-flex flex-row justify-content-start avito_homepage-components-footer__copyright">
                        <img class="img-fluid" src="img/logo_small.png" alt="">
                        <h6 class="my-auto pl-2 text-white">Ⓒ 2022 Avito s.r.o.</h6>
                    </div>
                </div>
            </div>
            <div class="p-2 w-25"></div>

            <div class="p-2 w-25">
                <div class="btn-group dropup float-right py-auto avito_homepage-components-footer__language">
                    <button type="button" class="btn btn-sm dropdown-toggle avito_homepage-components-footer__language-button avito_homepage-components-footer__language-button--color text-white"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __("object-names.language") }}
                    </button>
                    <div class="dropdown-menu avito_homepage-components-footer__language-dropdown-menu">
                        <a class="dropdown-item avito_homepage-components-footer__language-dropdown-menu-item" href="/set-language/en">English</a>
                        <a class="dropdown-item avito_homepage-components-footer__language-dropdown-menu-item" href="/set-language/cs">Čeština</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
