<!doctype html>
<html lang="en">
<head>
    @include("general.components.includes")
    @yield("special-includes")

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Avito</title>
</head>

<body>
@include("general.components.header")
@yield("page-contents")

<div class="fixed-bottom">
    @include("general.components.footer")
</div>
</body>
</html>


