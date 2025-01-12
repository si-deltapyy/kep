@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Payment'" :slash1="'Payment'" :slash2="'History'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">
    <div class="">
        <div>
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <div class="max-w-4xl mx-auto">
                    <div class="relative flex items-start space-x-4 mb-6">
                        <table border="1" class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Payment Date</th>
                                    <th>Link Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- kasih if else buat status pending, waiting(ketika menunggu accept admin), success --}}
                            @foreach ($payment as $x)
                                <tr>
                                    <td>{{ $x->payment_method }}</td>
                                    <td>{{ $x->payment_status }}</td>
                                    <td>{{ \Carbon\Carbon::parse($x->payment_date)->diffForHumans() }}</td>
                                    <td>{{ $x->path_proof }}</td>
                                </tr>
                                @role('user')
                                <a href="{{ route('user.payment.edit' , $x->id ) }}">Bayar bos</a>
                                @endrole

                                @role('admin')
                                <form action="{{ route('admin.payment.validate' , $x->id ) }}" method="POST">
                                    @csrf
                                    <button type="submit">validasi</button>
                                </form>
                                @endrole
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
