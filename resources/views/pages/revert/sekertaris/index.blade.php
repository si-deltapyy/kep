@extends('layouts.app')
@section('title')
    <x-page-tittle :title="'Daftar Ajuan Yang dapat Di Reset'" :slash1="'Pengajuan'" :slash2="'Reset'"
                   :slash3="''"></x-page-tittle>
@endsection

@section('content')
    @if (session('success'))
        <div id="errorAlert"
             class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-lg mb-4 relative"
             role="alert">
            <div class="flex items-center">
                <div class="mr-3">
                    <span data-lucide="circle-check" class="w-6 h-6 text-green-500"></span>
                </div>
                <div>
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
            <button type="button" onclick="closeAlert('errorAlert')"
                    class="absolute top-2 right-2 text-green-500 hover:text-green-700 focus:outline-none">
                <span data-lucide="x" class="w-5 h-5"></span>
            </button>
        </div>

        <script>
            function closeAlert(id) {
                const alert = document.getElementById(id);
                if (alert) {
                    alert.style.display = 'none';
                }
            }
        </script>
    @endif

    <div class="grid grid-cols-1 p-0 md:p-4">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                <table style="color : black!important;" class="w-full border-collapse" id="datatable_1">
                    <thead class="bg-slate-100 dark:bg-slate-700/20">
                    <tr>
                        @php
                            $head1 = ['ID', 'Usulan', 'Type Ajuan', 'Desc'];
                        @endphp
                        @foreach ($head1 as $header)
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                {{ $header }}
                            </th>
                        @endforeach
                        <th scope="col"
                            class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ajuan as $row)
                        <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                            <td class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">{{ $row->id }}</td>
                            <td class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">{{ $row->title }}</td>
                            <td class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">
                                {{$row->firstDocument->ajuanType->ajuan_name}}
                            </td>
                            <td class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">
                                @php
                                    if ($row->doc_status == "approved") {
                                        echo '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Cek di menu EC Document</button>';
                                    } elseif ($row->doc_status == "on-review") {
                                        echo '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Sedang di Review</button>';
                                    } elseif ($row->doc_status == "disapproved") {
                                        echo '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Ajuan sudah ditolak</button>';
                                    } elseif ($row->doc_status == "done") {
                                        echo '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Ajuan selesai</button>';
                                    }
                                @endphp
                            </td>
                            <td class="p-3 text-sm text-gray-900 whitespace-nowrap dark:text-gray-900">
                                <!-- Tombol untuk membuka modal -->
                                <button type="button"
                                        onclick="openModal({{ $row->id }})"
                                        class="px-2 py-1 bg-red-100 text-red-600 text-sm rounded hover:bg-red-200 border border-red-300 ml-2">
                                    Reset
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Reset -->
    <div id="resetModal"
         class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Reset</h2>
            <p class="text-gray-600 mb-4">Apakah Anda yakin ingin mereset ajuan ini?</p>
            <form id="resetForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            const modal = document.getElementById('resetModal');
            const form = document.getElementById('resetForm');

            // Ganti nilai ":id" dengan ID sebenarnya
            let routeTemplate = @json(route('sekertaris.revert.reset', ['id' => ':id']));
            form.action = routeTemplate.replace(':id', id);

            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('resetModal').classList.add('hidden');
        }
    </script>
@endsection
