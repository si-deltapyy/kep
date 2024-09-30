
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
<div id="myTabContent">
    <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
        aria-labelledby="all-tab">
        <div class="grid grid-cols-1 p-0 md:p-4">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                    {{-- table --}}
                    <!-- resources/views/somepage.blade.php -->
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
    </div>
</div>
@endsection
