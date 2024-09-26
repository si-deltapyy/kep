<table class="w-full">
    <thead class="bg-gray-50 dark:bg-gray-600/20">
      <tr>

       @foreach ($head as $head)
       <th
       scope="col"
       class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
     >
       {{$head}}
     </th>
       @endforeach
      </tr>
    </thead>
    <tbody>
        <!-- 1 -->
        @foreach ($data as $row)
          <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
            <!-- 2 -->
            @foreach ($row as $cell)
              <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
               {{ $cell }}
              </td>
            @endforeach
          </tr>
        @endforeach
      </tbody>

  </table>
