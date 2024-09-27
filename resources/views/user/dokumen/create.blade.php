{{-- ..resources\views\user\dokumen\create.blade.php --}}

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>
@endsection

@section('content')
<x-form-input method="POST" action="{{ route('user.ajuan.store') }}" has-file class="p-4">

    <x-input title="Judul Usulan: " id="pengusul" type="text" class="form-control" name="pengusul"/><br>

    @foreach ($type as $input)
        <x-input title="Upload {{$input->name}}: " type="file" id="doc{{$input->id}}" name="doc{{$input->id}}" accept=".docx, .pdf, .doc"/><br>
    @endforeach

    <x-button>
    Submit
    </x-button>

</x-form-input>
@endsection
