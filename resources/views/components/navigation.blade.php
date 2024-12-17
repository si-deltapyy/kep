<!-- resources/views/components/nav-link.blade.php -->
@props(['route', 'text', 'icon'])

<a href="{{ route($route) }}"
   class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
   <span data-lucide="{{ $icon }}" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
   <span>{{ $text }}</span>
</a>
