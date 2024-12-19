<!-- resources/views/components/nav-dropdown.blade.php -->
@props(['route', 'text', 'icon', 'items' => []])

<div x-data="{ open: false }" class="relative">
    <button @click="open = !open"
        class="nav-link hover:bg-transparent hover:text-white rounded-md dark:hover:text-slate-200 flex items-center px-3 py-3 cursor-pointer">
        <span data-lucide="{{ $icon }}" class="w-5 h-5 text-center hover:text-white text-slate-400 dark:text-slate-400 me-2"></span>
        <span>{{ $text }}</span>
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15l-7-7-7 7" />
        </svg>
    </button>

    <ul x-show="open" @click.outside="open = false" class="absolute z-10 left-0 w-full bg-transparent hover:bg-transparent  dark:hover:text-slate-200 dark:bg-slate-800 rounded-md shadow-md mt-1">
        @foreach ($items as $item)
            <li>
                <a href="{{ route($item['route']) }}"
                   class="block px-4 py-2 text-sm hover:bg-slate-100 dark:hover:bg-slate-700 dark:text-slate-200">
                    {{ $item['text'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>