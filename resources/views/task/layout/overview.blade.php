@extends("general.layout.general")
@section("page-contents")
    <div class="avito_task-layout-overview__container container-fluid mb-4 pt-5 px-5 mt-4">
        <div class="avito_task-layout-overview__container-inner container-fluid px-5">
            <div class="avito_task-layout-overview__container-inner-row d-flex flex-row justify-content-between">
                <div class="avito_task-layout-overview__search pt-3">
                    <form method="GET" class="avito_task-layout-overview__search-form form-inline">
                        <input class="avito_task-layout-overview__search-form-input form-control mr-sm-2" type="search" name="name"
                               placeholder="{{ __("forms.filter.search") }}" aria-label="Search"
                               value="{{ request("name") }}">
                        <div class="avito_task-layout-overview__search-form-type form-group mr-2">
                            <select class="avito_task-layout-overview__search-form-type-select form-control" name="type">
                                @if(is_null(request("type")))
                                    <option selected="selected"
                                            disabled>{{ __("forms.filter.selectTypeDefault") }}</option>
                                @endif
                                <option @if(request("type") == "Issue")
                                    {{ "selected='selected" }}
                                    @endif>Issue
                                </option>
                                <option @if(request("type") == "Request")
                                    {{ "selected='selected" }}
                                    @endif>Request
                                </option>
                            </select>
                        </div>
                        <div class="avito_task-layout-overview__search-form-state form-group mr-2">
                            <select class="avito_task-layout-overview__search-form-state-select form-control" name="state">
                                @if(is_null(request("state")))
                                    <option selected="selected"
                                            disabled>{{ __("forms.filter.selectStateDefault") }}</option>
                                @endif
                                <option @if(request("state") == "New")
                                    {{ "selected='selected" }}
                                    @endif>New
                                </option>
                                <option @if(request("state") == "Processing")
                                    {{ "selected='selected" }}
                                    @endif>Processing
                                </option>
                                <option @if(request("state") == "Done")
                                    {{ "selected='selected" }}
                                    @endif>Done
                                </option>
                                <option @if(request("state") == "Rejected")
                                    {{ "selected='selected" }}
                                    @endif>Rejected
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="avito_task-layout-overview__search-form-button btn btn-outline-primary mr-5">
                            <i class="fa-solid fa-filter pr-2"></i>{{ __("forms.filter.filter") }}</button>
                    </form>
                </div>

                <div class="avito_task-layout-overview__add-task align-self-end text-right">
                    <a href="/task/add">
                        <button type="button" class="avito_task-layout-overview__add-task-button btn btn-outline-success">
                            <i class="fa-solid fa-square-plus pr-2"></i>{{ __("tables.general.add") }}
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="avito_task-layout-overview__table-container-outer container-fluid px-5 pt-3">
            @if(count($tasks) != 0)
                @include("task.components.overview-table", ["tasks" => $tasks])
            @else
                <h4>{{ __("tables.general.noRecords") }}</h4>
            @endif
        </div>

        <div class="avito_task-layout-overview__paginator-container-outer container-fluid px-5 pb-5">
            <div class="avito_task-layout-overview__paginator-row d-flex flex-row justify-content-end">
                {{ $tasks->appends(Request::except("page"))->links() }}
            </div>
        </div>
    </div>
@endsection
