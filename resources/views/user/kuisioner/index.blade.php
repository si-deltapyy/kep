@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Kuisioner'" :slash1="'Pengajuan'" :slash2="'Kuisioner'" :slash3="'Input'"></x-page-tittle>


@endsection
@section('content')
<x-form-input method="POST" action="{{ route('user.kuisioner.store') }}" class="p-4">
@csrf

    @foreach ($index as $input)
        <x-input title="{{$input->kuisioner}}: " type="text" id="kuis{{$input->id}}" name="kuis{{$input->id}}"/><br>
    @endforeach

    <x-button>
    Submit
    </x-button>

</x-form-input>
@endsection

