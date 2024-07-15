<html>
    <head lang="en">
        <title>{{ $title ?? 'File Browser' }}</title>

        <meta name="viewport" content="width=device-width">

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        <link rel="icon" type="image/x-icon" href="favicon.svg">
    </head>
    <body>
        <div class="px-8 max-w-screen-xl mx-auto font-sans">
            {{ $slot ?? '' }}
        </div>
    </body>
</html>
