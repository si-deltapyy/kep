<table class="w-full">
    <thead class="bg-gray-50 dark:bg-gray-600/20">
        <tr>
            @foreach ($head as $header)
                <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                    {{ $header }}
                </th>
            @endforeach
            @if($actionHeader)  {{-- Check if action header is provided --}}
                <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                    Actions
                </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                @foreach ($row as $cell)
                    <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ $cell }}
                    </td>
                @endforeach
                @if($actionColumn)
                    <td>
                        {!! $actionColumn[$row['id']] !!}
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
