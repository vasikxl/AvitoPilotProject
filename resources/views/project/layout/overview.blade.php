@extends("general.layout.general")
@section("page-contents")
    <div class="avito_project-layout-overview__outer-container container-fluid mb-4 pt-5 px-5 mt-4">
        <div class="avito_project-layout-overview__outer-container-search container-fluid px-5">
            <div class="avito_project-layout-overview__outer-container-search-row d-flex flex-row justify-content-between">
                <div class="avito_project-layout-overview__search-container">
                    <form method="GET" class="avito_project-layout-overview__search-form form-inline pr-4">
                        <input class="avito_project-layout-overview__search-form-input form-control mr-sm-2" type="search" name="search"
                               placeholder="{{ __("forms.filter.search") }}" aria-label="Search"
                               value="{{ request("search") }}">
                        <button class="avito_project-layout-overview__search-form-button btn btn-outline-primary my-2 my-sm-0" type="submit">
                            <i class="fa-solid fa-magnifying-glass pr-2"></i>{{ __("forms.filter.search") }}</button>
                    </form>
                </div>

                <div class="avito_project-layout-overview__add-container self-end text-right">
                    <a href="/project/add">
                        <button type="button" class="avito_project-layout-overview__add-button btn btn-outline-success">
                            <i class="fa-solid fa-square-plus pr-2"></i>{{ __("tables.general.add") }}
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="avito_project-layout-overview__outer-container-table container-fluid px-5 pt-3">
            @if(count($rows) != 0)
                @include("project.components.overview-table", ["projects" => $rows, "projectsToTasks" => $projectsToTasks])
            @else
                <h4>{{ __("tables.general.noRecords") }}</h4>
            @endif
        </div>

        <div class="avito_project-layout-overview__outer-container-paginator container-fluid px-5 pb-5">
            <div class="avito_project-layout-overview__outer-container-paginator-row d-flex flex-row justify-content-end">
                {{ $rows->appends(Request::except("page"))->links() }}
            </div>
        </div>
    </div>
@endsection







