<table class="avito_user-components-overview-table__table table">
    <thead class="avito_user-components-overview-table__table-head">
    <tr class="avito_user-components-overview-table__table-head-contents">
        <th class="avito_user-components-overview-table__table-head-contents-value" scope="col">{{ __("object-names.user.user") }}</th>
        <th class="avito_user-components-overview-table__table-head-contents-value" scope="col">{{ __("object-names.user.email") }}</th>
        <th class="avito_user-components-overview-table__table-head-contents-value" scope="col">&nbsp</th>
    </tr>
    </thead>
    <tbody class="avito_user-components-overview-table__table-body">
    @foreach($users as $user)
        <tr class="avito_user-components-overview-table__table-row">
            <th class="avito_user-components-overview-table__table-row-name align-middle" scope="row">{{ $user->getName() }}</th>
            <td class="avito_user-components-overview-table__table-row-email align-middle">{{ $user->getEmail() }}</td>

            <td class="avito_user-components-overview-table__table-row-action text-right align-middle" style="width: 15%">
                <span class="fa-stack fa">
                    <a href="/user/{{ $user->getSlug() }}/index">
                        <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-magnifying-glass-plus fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa"></span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
