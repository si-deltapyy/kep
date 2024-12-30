


@extends('layouts.app')
@section('title')
<x-page-tittle :title="'EC Document'" :slash1="'EC Document'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>
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
                  <x-form-input action="{{ route('sekertaris.ec.store') }}" method="POST" has-file enctype="multipart/form-data">
                    <input id="title" name="id" type="text" value="{{ $data->id}}" hidden>
                    <input id="title" name="user" type="text" value="{{ $user->id }}" hidden>


                    <x-input title="Nama Pengusul " value="{{ $user->name }}" id="name" name="name" type="text" class="form-control" readonly muted/>
                    <x-input title="Judul Usulan " id="title" name="title" type="text" value="{{ $data->title }}" class="form-control" readonly muted/>

                    <div class="col-span-1">
                        <x-file-upload title="Upload File" id="file" name="file" type="file" accept=".pdf" class="file-input"/><br>
                    </div>

                    <a href="{{ route('sekertaris.ec.show', ['ECDokuman' => $data->id]) }}" target="blank"
                        class='px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white'>Preview</a>

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
