<div>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Judul Usulan</td>
                <td>Tanggal Pengajuan</td>
                <td>Status</td>
                <td>Detail</td>
                @can('resubmission')
                <td>Note</td>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $doc)
            <tr>
                <td>{{$doc->id}}</td>
                <td>{{$doc->title}}</td>
                <td>{{$doc->created_at}}</td>
                <td>{{$doc->doc_status}}</td>
                <td><a href="{{ route('ajuan.detail', $doc->doc_group) }}">cek detail</a></td>
                @can('resubmission')
                <td>Revisi Ulang</td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('ajuan.upload')}}">usulkan</a>
    <a href="{{ route('dashboard') }}">dashboard</a>
</div>
