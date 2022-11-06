<footer>
    <div class="container-fluid pr-0 avito_footer-component-background">
        <div class="d-flex flex-row justify-content-between">
            <div class="w-50">
                <div class="container-fluid px-0">
                    <div class="d-flex flex-row justify-content-start">
                        <img class="img-fluid" src="{{ request()->routeIs("Home") ? "img/logo_small.png" : "/img/logo_tiny.png" }}" alt="">
                        <h6 class="my-auto pl-2 text-white">Ⓒ 2022 Avito s.r.o.</h6>
                    </div>
                </div>
            </div>
            <div class="p-2 w-25"></div>

            <div class="p-2 w-25">
                @if(request()->routeIs("Home"))
                    <div class="btn-group dropup float-right py-auto">
                        <button type="button" class="btn btn-sm dropdown-toggle avito_footer-component-language--color text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __("object-names.language") }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="avito_dropdown-component-item dropdown-item">English</a>
                            <a class="avito_dropdown-component-item dropdown-item">Čeština</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>
