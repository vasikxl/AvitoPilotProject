@extends("general.layout.general")
@section("page-contents")
    <div class="avito_user-layout-index__table-container container pt-5 mb-3">
        <h3 class="avito_user-layout-index__table-header text-center pb-2">{{ __("tables.index.user.header") }}</h3>
        <table class="avito_user-layout-index__table table">
            <thead class="avito_user-layout-index__table-head">
            <tr class="avito_user-layout-index__row">
                <th class="avito_user-layout-index__row-name-header row">{{ __("object-names.user.name") }}</th>
                <th class="avito_user-layout-index__row-email-header row">{{ __("object-names.user.email") }}</th>
            </tr>
            </thead>

            <tbody>
            <tr class="avito_user-layout-index__row">
                <td class="avito_user-layout-index__row-name-value">{{ $user->getName() }}</td>
                <td class="avito_user-layout-index__row-email-value">{{ $user->getEmail() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection







