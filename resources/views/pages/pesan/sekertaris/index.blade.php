{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Review</th>
                <th>Reviewer ID</th>
                <th>Document ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesan as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>{{ $p->updated_at }}</td>
                    <td>{{ $p->review }}</td>
                    <td>{{ $p->reviewer_id }}</td>
                    <td>{{ $p->dummy_id }}</td>
                    <td><a href="{{route('messages.show', $p->dummy_id)}}">show</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}




@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 rounded-md w-full relative">
        <div class="flex-auto p-4">
            <div class="mb-4 border-b border-gray-200 dark:border-slate-700" data-fc-type="tab">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" aria-label="Tabs">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 rounded-t-lg border-b-2 active" id="profile-tab" data-fc-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Plan Files</button>
                    </li>

                </ul>
            </div>
            <div id="myTabContent">
                <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800 active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="gap-3 flex flex-wrap">
                        @foreach($pesan as $p)
                            <div class="border border-slate-200 dark:border-slate-700 rounded p-5 inline-block cursor-pointer">
                                <a href="{{route('messages.show', $p->dummy_id)}}">
                                    <div class="text-center">
                                        <i class="icofont-file-alt text-slate-500 text-4xl"></i>
                                        <h6 class="truncate font-medium dark:text-slate-300 text-sm">{{$p->Document->doc_name}}</h6>
                                        <small class="text-slate-400">Tanggal  : {{$p->created_at}}</small>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--end card-body-->
    </div>
</div><!--end inner-grid-->



@endsection





