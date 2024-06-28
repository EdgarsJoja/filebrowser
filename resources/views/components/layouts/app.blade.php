<html>
    <head lang="en">
        <title>{{ $title ?? 'FileBrowser' }}</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="max-w-screen-xl mx-auto">
            {{ $slot ?? '' }}
        </div>
    </body>
</html>
