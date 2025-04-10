@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>
@endsection

@if(session('error'))
    <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium">alert!</span>  {{ session('error') }}
    </div>
@endif

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
                    <x-input title="Judul Usulan (Dalam Bahasa Inggris)" id="pengusul" type="text" class="form-control" name="pengusul"/>
                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                      <select required name="typeajuan" id="at" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700">
                        <option value="0">-- Pilih Type Ajuan -- </option>
                        @foreach ($ajuan as $s)
                          <option value="{{$s->id}}">{{$s->ajuan_name}}</option>
                        @endforeach
                      </select>
                  </div>
                  @foreach ($type as $input)
                  <div class="col-span-1">
                      <x-file-upload title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" required="{{ $input->is_required }}"  class="file-input" accept=".pdf" /><br>
                  </div>
                  @endforeach
                  
                  <!-- Tombol Next, awalnya disembunyikan -->
                  <div class="col-span-1" style="display: none; text-align: center; margin-top: 10px;" id="nextButton">
                      <button type="button" class="btn btn-primary">Next</button>
                  </div>
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
            const nextButton = document.getElementById('nextButton');

            // Sembunyikan semua input file kecuali yang pertama
            fileInputs.forEach(input => {
                input.style.display = 'none';
            });

            if (fileInputs.length > 0) {
                fileInputs[0].style.display = 'block';
            }

            function checkNextButton() {
                if (fileInputs[6] && fileInputs[7] && fileInputs[6].style.display === 'block' && fileInputs[7].style.display === 'block') {
                    nextButton.style.display = 'block';
                }
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

                        // Cek apakah harus menampilkan tombol Next
                        checkNextButton();
                    }
                });
            });

            // Cek apakah tombol Next harus ditampilkan sejak awal
            checkNextButton();
        });

        </script>

@endsection
