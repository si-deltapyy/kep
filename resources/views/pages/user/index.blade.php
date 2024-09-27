
@php
// Data Reviewer
$head1 = ['id','Name', 'Email', 'Created_at'];
$data1 = $user->map(function($user) {
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'created_at' => $user->created_at,
          ];
});

$actions1 = $user->mapWithKeys(function ($user) {
    return [
        $user->id => '<form action="' . route('sekretariat.review.destroy', $user->id) . '" method="post" style="display:inline;">
            ' . csrf_field() .
            method_field('DELETE') . '
            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
        </form>
        <a href="' . route('sekretariat.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
    ];
})->toArray();
@endphp


@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection
@section('content')


<div
                class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20"
                id="orders"
                role="tabpanel"
                aria-labelledby="orders-tab"
                >
                <div class="grid grid-cols-1 p-0 md:p-4">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">


                        <x-table
                            :head="$head1"
                            :data="$data1->toArray()"
                            :actionHeader="true"
                            :actionColumn="$actions1"
                        />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
                <div class="flex justify-between mt-4">
                    <div class="self-center">
                    <p class="dark:text-slate-400">
                        Showing 1 - 20 of 1,524
                    </p>
                    </div>
                    <div class="self-center">
                    <ul class="inline-flex items-center -space-x-px">
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 ms-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-left"></i>
                        </a>
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >1</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            aria-current="page"
                            class="z-10 py-2 px-3 leading-tight text-brand-600 bg-brand-50 border border-brand-300 hover:bg-brand-100 hover:text-brand-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                            >2</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >3</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-right"></i>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>

@endsection
