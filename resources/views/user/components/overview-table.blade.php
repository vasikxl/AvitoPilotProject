<table class="table">
    <thead>
    <tr>
        <th scope="col">{{ __("object-names.user.user") }}</th>
        <th scope="col">{{ __("object-names.user.email") }}</th>
        <th scope="col">&nbsp</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th class="align-middle" scope="row">{{ $user->getName() }}</th>
            <td class="align-middle">{{ $user->getEmail() }}</td>

            <td class="text-right align-middle" style="width: 15%">
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
