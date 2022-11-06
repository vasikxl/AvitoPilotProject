<!doctype html>
<html lang="en">
<head>
    @include("homepage.components.includes")

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Avito</title>
</head>

<body>
@include("homepage.components.header")

@yield('content')

<div class="fixed-bottom">
    @include("homepage.components.footer")
</div>
</body>
</html>


