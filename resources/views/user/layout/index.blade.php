@extends("general.layout.general")
@section("page-contents")
    <div class="container pt-5 mb-3">
        <h3 class="text-center pb-2">{{ __("tables.index.user.header") }}</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="row">{{ __("object-names.user.name") }}</th>
                <th scope="row">{{ __("object-names.user.email") }}</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>{{ $user->getName() }}</td>
                <td>{{ $user->getEmail() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection







