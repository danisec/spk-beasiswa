<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" href="{{ URL('favicon.png') }}" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>{{ $title }} - SPK Beasiswa</title>
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @if (request()->url() === URL('login') || request()->url() === URL('register'))
        {{ '' }}
    @else
        <x-organisms.header />
    @endif

    {{ $slot }}

    @notifyJs
    <x:notify-messages />
</body>

</html>
