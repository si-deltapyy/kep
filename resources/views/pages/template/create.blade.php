@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Upload Template'" :slash1="'Admin'" :slash2="'Kelola Template'" :slash3="'Upload'"></x-page-tittle>
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
                      Kelola Template
                    </h4>
                  </div>
                </div>
                <!--end header-title-->
                <div class="flex-auto p-4">
                  <x-form-input method="POST" action="{{ route('admin.template.store') }}" has-file class="p-4">

                    <x-input title="Nama Template " id="tempName" type="text" class="form-control" name="tempName"/>
                    <select name="ajuan" id="ajuan" class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                        <option value="">-- Pilih Jenis Ajuan --</option>
                        @foreach ($type as $x)
                            <option value="{{ $x->id }}">{{ $x->ajuan_name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-4">
                        <x-file-upload title="Upload Template " type="file" name="tempFile" id="tempFile" class="file-input" accept=".docx, .pdf, .doc"/>
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
@endsection

