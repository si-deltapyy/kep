@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Setting'" :slash1="'-'" :slash2="''" :slash3="''"></x-page-tittle>
@endsection     

@section('content')
{{ $is_down }}
@endsection
