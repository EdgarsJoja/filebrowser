<html>
    <head lang="en">
        <title>{{ $title ?? 'FileBrowser' }}</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        {{ $slot ?? '' }}
    </body>
</html>
