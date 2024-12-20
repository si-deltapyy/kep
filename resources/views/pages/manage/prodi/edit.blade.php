


@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Manage'" :slash1="'Administrator'" :slash2="'Manage'" :slash3="'Prodi'"></x-page-tittle>


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
                @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md">
                    <p>{{ session('success') }}</p>
                </div>
                @endif
                  <div class="flex-none md:flex">
                    <h4
                      class="font-medium text-lg flex-1 self-center mb-2 md:mb-0"
                    >
                      Edit User
                    </h4>

                  </div>
                </div>
                <!-- Alert Success -->

                <!--end header-title-->
                <div class="flex-auto p-4">
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                  <x-form-input action="{{ route('superadmin.prodi.update', ['prodi' => $prodi->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <x-input title="Nama Prodi" id="name" name="name" value="{{ $prodi->name }}" type="text" class="form-control" />
                    <x-input title="Kode Prodi" id="prodi_kode" name="prodi_kode" value="{{ $prodi->prodi_kode }}" type="text" class="form-control" />

                    <button
                      type="submit"
                      class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0"
                    >
                      Submit
                    </button>
                    <button
                      type="button"
                      class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0"
                    >
                      Cancel
                    </button>
                  </x-form-input>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
        </div>
@endsection
