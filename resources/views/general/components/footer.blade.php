<footer class="avito_general-components-footer__footer">
    <div class="avito_general-components-footer__footer-container container-fluid pr-0 avito_footer-component-background">
        <div class="avito_general-components-footer__footer-container-row d-flex flex-row justify-content-between">
            <div class="avito_general-components-footer__footer-copyright w-50">
                <div class="avito_general-components-footer__footer-copyright-container container-fluid px-0">
                    <div class="avito_general-components-footer__footer-copyright-container-row d-flex flex-row justify-content-start">
                        <img class="avito_general-components-footer__footer-copyright-image img-fluid" src="{{ request()->routeIs("Home") ? "img/logo_small.png" : "/img/logo_tiny.png" }}" alt="">
                        <h6 class="avito_general-components-footer__footer-copyright-header my-auto pl-2 text-white">Ⓒ 2022 Avito s.r.o.</h6>
                    </div>
                </div>
            </div>
            <div class="avito_general-components-footer__footer-blank-space p-2 w-25"></div>

            <div class="avito_general-components-footer__footer-language p-2 w-25">
                @if(request()->routeIs("Home"))
                    <div class="avito_general-components-footer__footer-language-container btn-group dropup float-right py-auto">
                        <button type="button" class="avito_general-components-footer__footer-language-button btn btn-sm dropdown-toggle avito_footer-component-language--color text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __("object-names.language") }}
                        </button>
                        <div class="avito_general-components-footer__footer-language-dropdown dropdown-menu">
                            <a class="avito_general-components-footer__footer-language-dropdown-item avito_dropdown-component-item dropdown-item">English</a>
                            <a class="avito_general-components-footer__footer-language-dropdown-item avito_dropdown-component-item dropdown-item">Čeština</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>
