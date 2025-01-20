<nav class="flex justify-between px-3">
    <ol class="inline-flex flex-wrap items-center mb-3 space-x-3 text-sm sm:mb-0 text-base-content">
        @foreach($fullPath() as $pathPart)
            <li>
                <a
                    href="#_"
                    class="inline-flex items-center py-1 font-normal focus:outline-none"
                >
                    {{ $pathPart }}
                </a>
            </li>
            <span class="mx-2">/</span>
        @endforeach
    </ol>
</nav>
