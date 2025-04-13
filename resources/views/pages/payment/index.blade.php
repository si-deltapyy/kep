@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Payment'" :slash1="'Payment'" :slash2="'History'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">
     {{-- Foreach --}}
     <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
         @foreach ($payment as $x)
         <div class="sm:col-span-12  md:col-span-12 lg:col-span-3 xl:col-span-3 ">
             <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                 <div class="flex-auto text-center p-14">
                     <span class="inline-flex bg-primary-500/20 text-primary-500 font-semibold uppercase text-[0.688rem] leading-4 tracking-widest py-1 px-3 rounded-full mb-4">{{ $x->payment_status }}</span>
                     <h2 class="font-bold uppercase tracking-wide text-center mb-4 text-gray-800 dark:text-slate-400">
                         {{$x->Dummy->firstDocument->ajuanType->ajuan_name}}
                     </h2>
                     <div class="text-base font-medium mb-10 sm:mb-8 lg:mb-10">
                         <span class="flex flex-col items-center justify-center">
                             <ins class="text-2xl tracking-tight text-gray-800 font-normal no-underline mx-3 dark:text-slate-200">{{'Rp ' . number_format($x->amount, 0, ',', '.').',00 '}}</ins>
                             <span class="text-gray-400">{{ $x->payment_method ?? 'Belum Memilih Metode Pembayaran'}}</span>
                         </span>
                     </div>
                     <p class="mb-5 dark:text-slate-400 font-medium text-base">{{$x->Dummy->title}}</p>
                     {{-- Modal --}}
                     <button type="button" data-fc-type="modal" data-fc-target="modalcenter" class="inline-block focus:outline-none text-slate-500 hover:bg-slate-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-slate-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-slate-500  text-sm font-medium py-1 px-3 rounded ">
                        Bukti Transaksi
                    </button>

                    <div class="modal animate-ModalSlide hidden" id="modalcenter">
                        <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
                            <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                                <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                                    <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Bukti Transaksi</h6>
                                    <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
                                </div>
                                <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                                    <img src="{{ asset('app/' . $x->path_proof) }}" alt="">
                                </div>
                                <div class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                                    <button class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal End --}}
                     <div class="xl:block">
                        @role('user')
                            <a href="{{ route('user.payment.edit' , $x->id ) }}" class="block text-primary-500  font-semibold  focus:outline-none">Lanjutkan Pembayaran <i class="fas fa-arrow-right-long self-center"></i></a>
                            @endrole
                            @role('admin')
                            <form action="{{ route('admin.payment.validate' , $x->id ) }}" method="POST">
                                @csrf
                                <button type="submit" style="margin-left: 30%" class="mt-2 block text-primary-500  font-semibold  focus:outline-none">Validasi<i class="fas fa-arrow-right-long self-center"></i></button>
                            </form>
                            @endrole
                          </div>
                 </div><!--end card-body-->
             </div> <!--end card-->
         </div><!--end col-->
         @endforeach
     </div><!--end inner-grid-->
</div>
@endsection
{{--
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
</div> --}}



