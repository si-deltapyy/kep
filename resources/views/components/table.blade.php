@props([
    'head',
    'data',
    'actionHeader' => false,
    'actionSelect' => false,
    'actionColumn' => [],
    'customColumns' => [] // Tambahkan default kosong
])

<table style="color : black!important;" class="w-full border-collapse" id="datatable_1">
    <thead class="bg-slate-100 dark:bg-slate-700/20">
        <tr>
            @foreach ($head as $header)
                <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                    {{ $header }}
                </th>
            @endforeach
            @if($actionHeader)
                <th scope="col" class="p-3 text-xs font-medium tracking-wider text-left text-gray-900 dark:text-gray-400 uppercase">
                    Actions
                </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                @if (is_array($row) || is_object($row))
                    @foreach ($row as $key => $cell)
                        <td class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">
                            @if (!empty($customColumns) && isset($customColumns[$key]))
                                {{-- Jika ada custom rendering untuk kolom ini --}}
                                {!! $customColumns[$key]($cell, $row) !!}
                            @else
                                {{ $cell }}
                            @endif
                        </td>
                    @endforeach
                @else
                    <td colspan="{{ count($head) }}" class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">
                        {{ $row }}
                    </td>
                @endif

                @if ($actionSelect && isset($actionColumn[$row['id']]))
                    <td>
                        {!! $actionColumn[$row['id']] !!}
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>

  </table>
