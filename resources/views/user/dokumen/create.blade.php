@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>
@endsection
{{--
@section('content')
<x-form-input method="POST" action="{{ route('user.ajuan.store') }}" has-file class="p-4">
@csrf
    <x-input title="Judul Usulan: " id="pengusul" type="text" class="form-control" name="pengusul"/><br>
    @foreach ($type as $input)
        <x-input title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" accept=".docx, .pdf, .doc"/><br>
    @endforeach
    <x-button>
    Submit
    </x-button>
</x-form-input>
@endsection --}}


@section('content')
        <div
            class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4"
          >
            <div
              class="sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-6 xl:col-start-4"
            >
              <div
                class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative mb-4"
              >
                <div
                  class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70"
                >
                  <div class="flex-none md:flex">
                    <h4
                      class="font-medium text-lg flex-1 self-center mb-2 md:mb-0"
                    >
                      Pengajuan Dokumen
                    </h4>
                  </div>
                </div>
                <!--end header-title-->
                <div class="flex-auto p-4">
                  <x-form-input method="POST" action="{{ route('user.ajuan.store') }}" has-file class="p-4">
                    <x-input title="Judul Usulan " id="pengusul" type="text" class="form-control" name="pengusul"/>
                    @foreach ($type as $input)
                    <div class="col-span-1">
                        <x-file-upload title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" class="file-input" accept=".docx, .pdf, .doc"/><br>
                    </div>
                     @endforeach
                    <x-button>Submit</x-button>
                  </x-form-input>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
          </div>
          <script>
           document.addEventListener('DOMContentLoaded', function() {
                const fileInputs = document.querySelectorAll('.file-input');

                fileInputs.forEach(input => {
                    input.style.display = 'none';
                });

                // Display the first file input by default
                if (fileInputs.length > 0) {
                    fileInputs[0].style.display = 'block';
                }

                // Show the next file input when a file is selected
                fileInputs.forEach((input, index) => {
                    input.addEventListener('change', function() {
                        if (this.files.length > 0) {
                            if (fileInputs[index + 1]) {
                                fileInputs[index + 1].style.display = 'block';
                            }
                        }
                    });
                });
            });
        </script>
@endsection
