@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Payment'" :slash1="'Payment'" :slash2="'History'" :slash3="''"></x-page-tittle>
@endsection
@push('pages-style')
<!-- Css -->
<link rel="stylesheet" href="{{asset('assets/libs/uppy/uppy.min.css')}}">


@endpush
@push('pages-script')
<!-- JS -->
<script src="{{asset('assets/libs/uppy/uppy.min.js')}}"></script>
<script src="{{asset('assets/js/pages/upload.init.js')}}"></script>
@endpush
@section('content')
<h2>Bayar pada : xxxxxxx</h2>

<form action="{{ route('user.payment.update', $payment->id) }}" method="POST" has-file enctype="multipart/form-data">
    @csrf
    @method('PUT')
    Metode
    <Select name="metode" id="metode" class="form-control">
        <option value="0">-- Pilih Metode --</option>
        <option value="transfer">Transfer Bank</option>
        <option value="e-wallet">e-wallet</option>
        <option value="VA">Virtual Account</option>
    </Select>
    <div class="d-grid">
        <p class="text-slate-400 mb-4">Upload your blog image here, Please click "Upload Image" Button.</p>
        <div class="preview-box block justify-center rounded overflow-hidden bg-slate-50 dark:bg-slate-900/20 p-4 mb-4"></div>
        <input type="file" id="input-file" name="proof" accept="image/*" onchange={handleChange()} hidden />
        <label class="btn-upload px-3 py-2 lg:px-4 bg-blue-500 text-white text-sm font-semibold rounded hover:bg-blue-600 mt-4" for="input-file">Upload Image</label>
    </div>
    {{-- <input type="file" name="proof" id=""  accept=".jpg , .png, .jpeg"> --}}
    <button type="submit" class="mt-5 inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded">Save</button>
</form>
@endsection

