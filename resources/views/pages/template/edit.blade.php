{{-- <form action="{{ route('admin.template.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label for="Rumpun">Rumpun</label>
    <select name="ajuan" id="Rumpun">
        <option value="">Pilih Rumpun</option>
        @foreach ($type as $option)
            <option value="{{ $option->id }}">{{ $option->ajuan_name }}</option>
        @endforeach
    </select>
    <label for="Template">Template</label>
    <input type="text" name="tempName" id="Template" value="{{ $data->template_name }}">

    <label for="File">File</label>
    <input type="file" name="tempFile" id="File">

    <button type="submit">Update</button>
</form> --}}




@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Edit Template'" :slash1="'Admin'" :slash2="'Kelola Template'" :slash3="'Edit'"></x-page-tittle>
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
                      Edit Template
                    </h4>
                  </div>
                </div>
                <!--end header-title-->
                <div class="flex-auto p-4">
                  <x-form-input method="POST" action="{{ route('admin.template.update', $data->id) }}" has-file class="p-4">
                    @method('PATCH')
                    <x-input title="Nama Template " id="tempName" type="text" class="form-control" name="tempName"/>
                    <select name="ajuan" id="Rumpun" class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                        @foreach ($type as $option)
                            <option value="{{ $option->id }}">{{ $option->ajuan_name }}</option>
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

