

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
@role('user')

@include('dashboard-partial.user', ['user' => $user, ])
@endrole
@endsection
