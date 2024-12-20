@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Assign reviewer'" :slash1="'Daftar Ajuan'" :slash2="'List'" :slash3="''"></x-page-tittle>
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
                      {{$dummy->title}}
                    </h4>

                  </div>
                </div>
                <!--end header-title-->
                <div class="flex-auto p-4">
                  <x-form-input action="{{route('sekertaris.pengajuan.update', $dummy->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="w-full mb-3">
                        <label for="review" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pilih Reviewer
                        </label>
                        <select name="review[]" id="review" multiple
                            class="block w-full py-2 px-3 text-sm border border-gray-300 rounded-lg bg-white text-gray-900 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled>-- Pilih Reviewer --</option>
                            @if ($reviewer && count($reviewer) > 0)
                                @foreach ($reviewer as $x)
                                    <option value="{{ $x->id }}">{{ $x->name }}</option>
                                @endforeach
                            @else
                                <option value="" disabled>Reviewer tidak tersedia</option>
                            @endif
                        </select>


                    </div>
                    <button
                      type="submit"
                      class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0"
                    >
                      Assign Reviwer
                    </button>
                    <a
                      href="{{route('sekertaris.pengajuan.index')}}"
                      class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500 text-sm font-medium py-1 px-3 rounded mb-1 lg:mb-0"
                    >
                      Cancel
                    </a>
                  </x-form-input>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
        </div>
        @endsection


