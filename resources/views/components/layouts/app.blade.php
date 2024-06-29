<html>
    <head lang="en">
        <title>{{ $title ?? 'FileBrowser' }}</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="px-8 max-w-screen-md mx-auto">
            {{ $slot ?? '' }}
        </div>
    </body>
</html>
