@extends('layouts.app')

@section('content')
<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-6 xl:col-start-4">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative mb-4">
            <div class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                <div class="flex-none md:flex">
                    <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">
                        Edit Pengajuan Dokumen
                    </h4>
                </div>
            </div>

            <div class="flex-auto p-4">
                <x-form-input method="POST" action="{{ route('user.ajuan.update', $draft->id) }}" has-file class="p-4">
                    @method('PUT')
                    @csrf

                    <x-input title="Judul Usulan " id="pengusul" type="text" class="form-control" name="pengusul" value="{{ old('pengusul', $draft->title) }}"/>

                    <select name="typeajuan" id="at">
                        <option value="0">-- Pilih Type Ajuan --</option>
                        @foreach ($ajuan as $s)
                            <option value="{{ $s->id }}" {{ $s->id == $document[1]->ajuan_type ? 'selected' : '' }}>
                                {{ $s->ajuan_name }}
                            </option>
                        @endforeach
                    </select>

                    @foreach ($types as $input)
                        <div class="col-span-1">
                            @if (isset($document[$input->id]))
                                <x-file-upload :required="false" title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" value="{{ asset('/app/' . $document[$input->id]->doc_path) }}" class="file-input" accept=".pdf"/>
                                <!-- Tampilkan preview PDF jika dokumen ada -->
                                @if($document[$input->id]->doc_path)
                                    <p class="text-gray-500">File saat ini: <a href="{{ asset('/app/' . $document[$input->id]->doc_path) }}" target="_blank" class="text-blue-500 underline">Lihat</a></p>
                                    <!-- Preview PDF -->
                                    <iframe class="pdf-preview" src="{{ asset('/app/' . $document[$input->id]->doc_path) }}" frameborder="0" width="100%" height="400px"></iframe>
                                @endif
                            @else
                                <x-file-upload :required="false" title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" value="" class="file-input" accept=".pdf"/>
                                <p class="text-gray-500">File saat ini: <a href="#" target="_blank" class="text-blue-500 underline">Lihat</a></p>
                                <!-- Preview PDF -->
                                <iframe class="pdf-preview" src="#" frameborder="0" width="100%" height="400px"></iframe>
                            @endif
                        </div>
                    @endforeach

                    <x-button>Update</x-button>
                </x-form-input>
            </div>
        </div>
    </div>
</div>

<style>
    .pdf-preview {
        width: 100%;
        aspect-ratio: 4 / 3;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInputs = document.querySelectorAll('.file-input');
        const maxSize = 2 * 1048576; // 2MB

        fileInputs.forEach(input => {
            input.addEventListener('change', function () {
                if (this.files.length > 0) {
                    const file = this.files[0];

                    if (file.size > maxSize) {
                        alert(`File terlalu besar. Ukuran maksimal adalah ${maxSize / 1048576}MB.`);
                        this.value = '';
                        return;
                    }
                }
            });
        });
    });
</script>
@endsection
