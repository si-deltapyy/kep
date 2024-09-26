<!-- /resources/views/components/button/index.blade.php -->

@aware([
    'type',
])

<button
    type="submit"
    {{ $attributes->class([
        'px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white',
        ])
    }}
>
    {{ $slot }}
</button>
