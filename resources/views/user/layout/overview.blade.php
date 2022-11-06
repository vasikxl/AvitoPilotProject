@extends("general.layout.general")
@section("page-contents")
    <div class="container mb-4 pt-5 mt-4">
        <div class="container-fluid px-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <form method="GET" class="form-inline pr-4">
                        <input class="form-control mr-sm-2" type="search" name="search"
                               placeholder="{{ __("forms.filter.search") }}" aria-label="Search"
                               value="{{ request("search") }}">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                            <i class="fa-solid fa-magnifying-glass pr-2"></i>{{ __("forms.filter.search") }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid px-0 pt-3">
            @if(count($rows) != 0)
                @include("user.components.overview-table", ["users" => $rows])
            @else
                <h4>{{ __("tables.general.noRecords") }}</h4>
            @endif
        </div>

        <div class="container-fluid px-0 pb-5">
            <div class="d-flex flex-row justify-content-end">
                {{ $rows->appends(Request::except("page"))->links() }}
            </div>
        </div>
    </div>
@endsection







