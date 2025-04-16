@extends('layouts.app')
@section('title')
    <x-page-tittle :title="'Message'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        {{-- <div class="sm:col-span-12  md:col-span-12 lg:col-span-3 xl:col-span-3 ">
             <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                 <div class="border-0  pt-3 px-4 dark:text-slate-300/70">
                     <div class="border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-center" data-fc-type="tab">
                         <ul class="-mb-px grid grid-cols-3 place-content-stretch w-full" aria-label="Tabs">
                             <li class="me-2 flex items-center col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1" role="presentation">
                                 <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300 active" id="Inbox-tab" data-fc-target="#Inbox" type="button" role="tab" aria-controls="Inbox" aria-selected="false"><i class="icofont-email me-1 text-xl -mt-1"></i>Mail</button>
                             </li>
                         </ul>
                     </div>
                 </div><!--end header-title-->
                 <div class="flex-auto p-4">
                     <div id="EmailBox">
                         <div class="" id="Inbox" role="tabpanel" aria-labelledby="Inbox-tab">
                             <div class="">
                                 <button data-fc-type="modal" data-fc-target="compose_msg"  class="px-3 py-2 lg:px-4 block text-center w-full mb-4 bg-primary-500 text-white text-sm font-semibold rounded hover:bg-primary-600">Compose</button>
                                 <a href="javascript:void(0)" class="list-group-item border-0 text-primary  font-medium p-2 rounded-md bg-slate-50 dark:bg-slate-700 dark:text-slate-300 active flex justify-between">
                                     <span class="">
                                         <i class="text-lg icofont-inbox me-2"></i>Inbox
                                     </span>
                                     <span class="focus:outline-none text-[11px] bg-green-500/10 text-green-700 dark:text-green-600 rounded font-medium py-1 px-2">8</span>
                                 </a>
                                  </div>

                         </div>
                         <div class="hidden" id="UserChat" role="tabpanel" aria-labelledby="UserChat-tab">
                             <div id="accordion-collapse" data-fc-type="accordion">
                                 <h2 id="accordion-collapse-heading-1" data-fc-type="collapse">
                                     <button type="button" class=" p-4 w-full font-medium text-left text-gray-500 rounded-t-md border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-toggle='collapse' href="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                         <div class="relative">
                                             <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                 <i class="icofont-search z-[1]"></i>
                                             </div>
                                             <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Name, Email or Phone">
                                         </div>
                                     </button>
                                 </h2>
                                 <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
                                   <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                     <div class="flex items-center mb-3">
                                         <div class="w-8 h-8 rounded">
                                             <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-3.png" alt="logo" />
                                         </div>
                                         <div class="ms-2">
                                             <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Donald Gonzalez</h5></a>
                                             <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">Ontario, Canada</p>
                                         </div>
                                     </div>
                                     <div class="flex items-center mb-3">
                                         <div class="w-8 h-8 rounded">
                                             <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-2.png" alt="logo" />
                                         </div>
                                         <div class="ms-2">
                                             <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Ronald Young</h5></a>
                                             <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">New york, USA</p>
                                         </div>
                                     </div>
                                     <div class="flex items-center mb-3">
                                         <div class="w-8 h-8 rounded">
                                             <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-4.png" alt="logo" />
                                         </div>
                                         <div class="ms-2">
                                             <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Leslie Dunham</h5></a>
                                             <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">San Diego, California</p>
                                         </div>
                                     </div>
                                   </div>
                                 </div>
                                 <h2 id="accordion-collapse-heading-2"  data-fc-type="collapse">
                                   <button type="button" class="flex justify-between items-center p-4 w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-toggle='collapse' href="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                     <span><i class="icofont-users me-2"></i>Create Space</span>
                                     <i class="icofont-simple-up" data-accordion-icon></i>
                                   </button>
                                 </h2>
                                 <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                   <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700">
                                    <span class="text-slate-500 uppercase">Add Data</span>
                                   </div>
                                 </div>
                                 <h2 id="accordion-collapse-heading-3"  data-fc-type="collapse">
                                   <button type="button" class="flex justify-between items-center p-4 w-full font-medium text-left text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"  data-toggle='collapse' href="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                     <span><i class="icofont-speech-comments me-2"></i>Message Requests</span>
                                     <i class="icofont-simple-up" data-accordion-icon></i>
                                   </button>
                                 </h2>
                                 <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                                   <div class="p-4 border border-t-0 border-gray-200 dark:border-gray-700 rounded-b-lg">
                                     <span class="text-slate-500 uppercase">Add Data</span>
                                   </div>
                                 </div>
                             </div>
                         </div>
                         <div class="hidden" id="Meeting" role="tabpanel" aria-labelledby="Meeting-tab">
                             <div class="gap-4 grid grid-cols-2">
                                 <button class="col-span-1 text-blue-700 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 text-sm
                                     font-medium py-1 w-full">
                                     New Meeting
                                 </button>
                                 <button class="col-span-1 text-blue-700 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 text-sm
                                 font-medium py-1 w-full">
                                     Join a Meeting
                                 </button>
                             </div>
                             <h6 class="uppercase text-slate-600 mt-4 text-sm font-medium">My Meeting</h6>
                         </div>
                     </div>
                 </div><!--end card-body-->
             </div> <!--end card-->
         </div><!--end col--> --}}
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                <div class="p-4  ">
                    <h5 class="text-base font-semibold text-slate-700 dark:text-gray-400 leading-3 mt-4"> {{$pesan->Document->doc_name}} </h5>
                </div><!--end card-header-->
                <div class="flex-auto p-4">
                    <div class="flex items-center">
                        <img src="assets/images/users/avatar-8.png" alt="" class="mr-3 h-12 inline-block rounded-full">
                        <div class="self-center">
                            <h5 class="text-base font-semibold text-slate-700 dark:text-gray-400 leading-3">{{ $pesan->Sender->name ?? 'Nama Tidak Ditemukan' }}</h5>
                            <span class="text-slate-500 mr-2 text-xs">{{ $pesan->Sender->email ?? 'email Tidak Ditemukan' }}</span>
                        </div>
                    </div>

                    <div class="flex justify-start mt-2">
                        <div class="relative max-w-xs bg-gray-200 text-gray-900 rounded-xl px-4 py-2 text-sm shadow">
                            <p class="mb-4 font-medium">{{ $pesan->message }}</p>
                            <span class="absolute bottom-1 right-2 text-xs text-gray-500">
                            {{ \Carbon\Carbon::parse($pesan->created_at)->format('H:i') }}
                        </span>
                        </div>
                    </div>


                    <hr class="my-4 border-dashed dark:border-slate-700/50">

                    <div class="mt-4">
                        {{-- Reply --}}
                        <button class="inline-block focus:outline-none text-brand-500 hover:bg-brand-500 hover:text-white bg-transparent border border-brand-200 dark:bg-transparent dark:text-brand-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-brand-500  text-sm font-medium py-2 px-3"  type="button"
                                data-fc-type="modal"
                                data-fc-target="modal-primary"
                                data-doc-id="{{ $pesan->document_id ?? '' }}"
                                data-dummy-id="{{ $pesan->dummy_id ?? '' }}"
                                data-reviewer-id="{{ $pesan->reviewer_id ?? '' }}"
                                data-receiver-id="{{ $pesan->sender_id ?? '' }}"
                                class="px-2 py-1 lg:px-4 bg-transparent text-primary text-sm rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium"
                        >
                            <i class="icofont-reply"></i> Reply</button>

                        {{-- Forward --}}

                        @if (Auth::user()->hasRole('admin'))
                            <button
                                class="inline-block focus:outline-none text-brand-500 hover:bg-brand-500 hover:text-white bg-transparent border border-brand-200 dark:bg-transparent dark:text-brand-500
                        dark:hover:text-white dark:border-gray-700 dark:hover:bg-brand-500  text-sm font-medium py-2 px-3"
                                data-fc-type="modal"
                                data-fc-target="modal-feedback"
                                data-doc-id="{{ $pesan->document_id ?? '' }}"
                                data-dummy-id="{{ $pesan->dummy_id ?? '' }}"
                                data-reviewer-id="{{ $pesan->reviewer_id ?? '' }}"
                                data-receiver-id="{{ $pesan->Dummy->user_id ?? '' }}"
                            >
                                Kirim ke Pengusul <i class="icofont-bubble-right"></i></button>
                        @elseif (Auth::user()->hasRole('sekertaris'))
                            <button
                                class="inline-block focus:outline-none text-brand-500 hover:bg-brand-500 hover:text-white bg-transparent border border-brand-200 dark:bg-transparent dark:text-brand-500
                        dark:hover:text-white dark:border-gray-700 dark:hover:bg-brand-500  text-sm font-medium py-2 px-3"
                                data-fc-type="modal"
                                data-fc-target="modal-feedback"
                                data-doc-id="{{ $pesan->document_id ?? '' }}"
                                data-dummy-id="{{ $pesan->dummy_id ?? '' }}"
                                data-reviewer-id="{{ $pesan->reviewer_id ?? '' }}"
                                data-receiver-id="{{ $admin->id ?? '' }}"
                            >
                                Kirim ke Admin <i class="icofont-bubble-right"></i></button>
                        @else

                        @endif
                    </div>
                </div><!--end card-body-->
            </div> <!--end card-->
        </div><!--end col-->

        @if (isset($document))
            <!--Menampilkan Dokumen Spesifik-->
            <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                    <div class="p-4  ">
                        <h5 class="text-base font-semibold text-slate-700 dark:text-gray-400 leading-3 mt-4"> Dokumen Terkait </h5>
                        <p>{{$document->doc_name}}</p>
                    </div><!--end card-header-->
                    <div class="flex-auto p-4">
                        <div>
                            <a href="{{ asset('/app/' . $document->doc_path) }}" target="_blank" rel="noopener noreferrer"><button type="button" class="px-2 py-1 lg:px-4 bg-blue-500  text-white text-sm  rounded transition hover:bg-blue-200 hover:text-blue-500 order hover:border-blue-500 border-blue-500 font-medium">Buka di Tab Baru</button></a>
                            <iframe class="pdf-preview" src="{{ asset('/app/' . $document->doc_path) }}?v={{ time() }}" frameborder="0" width="100%" height="400px"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!--Menampilkan dokumen lain -->
            <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                    <div class="p-4  ">
                        <h5 class="text-base font-semibold text-slate-700 dark:text-gray-400 leading-3 mt-4"> Dokumen Lain </h5>
                    </div><!--end card-header-->
                    <div class="flex-auto p-4">
                        @if (isset($otherdocs))
                            @foreach($otherdocs as $doc)
                                @if($doc->id != $document->id)
                                    <div>
                                        <a href="{{ asset('/app/' . $doc->doc_path) }}" target="_blank" rel="noopener noreferrer"><button type="button" class="px-2 py-1 lg:px-4 bg-blue-500  text-white text-sm  rounded transition hover:bg-blue-200 hover:text-blue-500 order hover:border-blue-500 border-blue-500 font-medium">Buka di Tab Baru</button></a> {{$doc->doc_name}}
                                        <iframe class="pdf-preview" src="{{ asset('/app/' . $doc->doc_path) }}?v={{ time() }}" frameborder="0" width="100%" height="400px"></iframe>
                                    </div>
                                    <br>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endif

    </div><!--end inner-grid-->


    {{-- Modal --}}
    <div class="modal animate-ModalSlide hidden" id="modal-primary">
        <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                    <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Leave a Comment</h6>
                    <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
                </div>
                <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <!-- Hidden Inputs -->
                        <input type="hidden" id="doc-id-input" name="doc_id" value="">
                        <input type="hidden" id="doc-dummy-id" name="dummy_id" value="">
                        <input type="hidden" id="doc-reviewer-id" name="reviewer_id" value="">
                        <input type="hidden" id="doc-receiver-id" name="receiver_id" value="">

                        <label for="message" class="font-medium text-sm text-slate-600 dark:text-slate-400">Your message</label>
                        <textarea id="message" name="message" rows="4" class="form-input w-full rounded-md mt-1 border"></textarea>

                        <div class="flex flex-wrap shrink-0 justify-end p-3 rounded-b border-t border-dashed">
                            <button type="button" class="inline-block text-red-500 hover:bg-red-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                            <button type="submit" class="inline-block text-primary-500 hover:bg-primary-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Forward Feedback --}}
    <div class="modal animate-ModalSlide hidden" id="modal-feedback">
        <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                    <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Leave a Comment</h6>
                    <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
                </div>
                <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <!-- Hidden Inputs -->
                        <input type="hidden" id="doc-id-input" name="doc_id" value="">
                        <input type="hidden" id="doc-dummy-id" name="dummy_id" value="">
                        <input type="hidden" id="doc-reviewer-id" name="reviewer_id" value="">
                        <input type="hidden" id="doc-receiver-id" name="receiver_id" value="">

                        <label for="message" class="font-medium text-sm text-slate-600 dark:text-slate-400">Edit Jika Dibutuhkan</label>
                        <textarea id="message" name="message" rows="4" class="form-input w-full rounded-md mt-1 border"> {{$pesan->message}} </textarea>

                        <div class="flex flex-wrap shrink-0 justify-end p-3 rounded-b border-t border-dashed">
                            <button type="button" class="inline-block text-red-500 hover:bg-red-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                            <button type="submit" class="inline-block text-primary-500 hover:bg-primary-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('pages-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tambahkan event listener untuk semua tombol yang memicu modal
            document.querySelectorAll('[data-fc-type="modal"]').forEach(button => {
                button.addEventListener('click', function () {
                    // Ambil target modal dari atribut
                    const modalTarget = button.getAttribute('data-fc-target');
                    const modal = document.getElementById(modalTarget);

                    if (!modal) {
                        console.error(`Modal dengan ID "${modalTarget}" tidak ditemukan.`);
                        return;
                    }

                    // Ambil data dari tombol
                    const dummyId = button.getAttribute('data-dummy-id');
                    const docId = button.getAttribute('data-doc-id');
                    const reviewerId = button.getAttribute('data-reviewer-id');
                    const receiverId = button.getAttribute('data-receiver-id');

                    // Isi input modal dengan data dari tombol (hanya jika modal memiliki elemen ini)
                    modal.querySelector('#doc-id-input')?.setAttribute('value', docId || '');
                    modal.querySelector('#doc-dummy-id')?.setAttribute('value', dummyId || '');
                    modal.querySelector('#doc-reviewer-id')?.setAttribute('value', reviewerId || '');
                    modal.querySelector('#doc-receiver-id')?.setAttribute('value', receiverId || '');

                    modal.classList.remove('hidden');
                });
            });

            // Event listener untuk menutup modal
            document.querySelectorAll('[data-fc-dismiss]').forEach(button => {
                button.addEventListener('click', function () {
                    const modal = button.closest('.modal');
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endpush
