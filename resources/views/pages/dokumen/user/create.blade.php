@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>
@endsection



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
                    <select name="typeajuan" id="at">
                      <option value="0">-- Pilih Type Ajuan -- </option>
                      @foreach ($ajuan as $s)
                        <option value="{{$s->id}}">{{$s->ajuan_name}}</option>
                      @endforeach
                    </select>
                    @foreach ($type as $input)
                    <div class="col-span-1">
                        <x-file-upload title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" class="file-input" accept=".pdf"/><br>
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
            document.addEventListener('DOMContentLoaded', function () {
                const fileInputs = document.querySelectorAll('.file-input');
                const maxSize = 2 * 1048576; // Batas ukuran file dalam bytes (2MB)

                // Sembunyikan semua input file kecuali yang pertama
                fileInputs.forEach(input => {
                    input.style.display = 'none';
                });

                if (fileInputs.length > 0) {
                    fileInputs[0].style.display = 'block';
                }

                // Tambahkan event listener untuk setiap input file
                fileInputs.forEach((input, index) => {
                    input.addEventListener('change', function () {
                        if (this.files.length > 0) {
                            const file = this.files[0];

                            // Validasi ukuran file
                            if (file.size > maxSize) {
                                alert(`File terlalu besar. Ukuran maksimal adalah ${maxSize / 1048576}MB.`);
                                this.value = ''; // Reset input file
                                return; // Hentikan eksekusi
                            }

                            // Tampilkan input file berikutnya jika ada
                            if (fileInputs[index + 1]) {
                                fileInputs[index + 1].style.display = 'block';
                            }
                        }
                    });
                });
            });
        </script>

@endsection
