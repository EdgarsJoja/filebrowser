<nav class="flex justify-between px-3">
    <ol class="inline-flex flex-wrap items-center mb-3 space-x-3 text-sm [&_.active-breadcrumb]:text-neutral-500/80 sm:mb-0">
        @foreach($fullPath() as $pathPart)
            <li>
                <a
                    href="#_"
                    class="inline-flex items-center py-1 font-normal hover:text-blue-gray-900 focus:outline-none"
                >
                    {{ $pathPart }}
                </a>
            </li>
            <span class="mx-2 text-gray-400">/</span>
        @endforeach
    </ol>
</nav>
