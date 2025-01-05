@role('sekertaris')
    @php
        // Data Reviewer
        $head1 = ['No', 'Judul', 'Status'];
        $data1 = $docs->map(function($x, $index) {
            return [
                'id' => $x->id,
                'no' => $x->title,
                'doc' => $x->doc_flag,
            ];
        });

        // Define actions based on document ID
        $actions1 = $docs->mapWithKeys(function ($x) {
            return [
                $x->id => '
                <form action="' . route('sekertaris.upload.ec', $x->id) . '" method="POST">
                    ' . csrf_field() . '
                    <button type="submit" class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">Upload EC</button>
                </form>
                '
            ];
        })->toArray();
    @endphp
@endrole



@extends('layouts.app')

@section('title')
<x-page-tittle :title="'Ethical Clereance'" :slash1="'Ethical Clereance'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')

@role('sekertaris')
    @include('partial.ec.sekertaris');
@endrole

@role('user')
    @include('partial.ec.user');
@endrole

@role('admin')
    @include('partial.ec.admin');
@endrole

@role('kppm')
    @include('partial.ec.kppm');
@endrole
@endsection
