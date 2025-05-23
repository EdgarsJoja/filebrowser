<nav class="flex justify-between px-3">
    <ol class="inline-flex flex-wrap items-center mb-3 text-xs sm:mb-0 text-neutral-content">
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
