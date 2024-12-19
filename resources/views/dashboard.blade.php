@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
@role('user')
   @include('partial.dashboard.user')
@endrole

@role('admin')
   @include('partial.dashboard.admin')
@endrole

@role('reviewer')
@include('partial.dashboard.reviewer')
@endrole

@role('sekertaris')
@include('partial.dashboard.sekertaris')
@endrole

@role('super_admin')
@include('partial.dashboard.superAdmin')
@endrole

@endsection
