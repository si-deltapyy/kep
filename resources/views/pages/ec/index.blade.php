@role('sekertaris')
    @php
        // Data Reviewer
        $head1 = ['No', 'Judul', 'Name', 'Created_at'];
        $data1 = $doc->map(function($x, $index) {
            return [
                'id' => $x->id,
                'no' => $x->title,
                'doc_name' => $x->doc_name,
                'sd' => $x->created_at,
            ];
        });

        // Define actions based on document ID
        $actions1 = $doc->mapWithKeys(function ($x) {
            return [
                $x->id => '
                -'
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

@endsection


