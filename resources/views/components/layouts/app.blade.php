<html>
    <head lang="en">
        <title>{{ $title ?? 'File Browser' }}</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="icon" type="image/x-icon" href="favicon.png">
    </head>
    <body>
        <div class="px-8 max-w-screen-md mx-auto">
            {{ $slot ?? '' }}
        </div>
    </body>
</html>
