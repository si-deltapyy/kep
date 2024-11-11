<div>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nama Document</td>
                <td>Tanggal Pengajuan</td>
                <td>Status</td>
                <td>Note</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $x)
            <tr>
                <td>{{$x->id}}</td>
                <td>{{$x->doc_name}}</td>
                <td>{{$x->created_at}}</td>
                <td>{{$x->doc_status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="{{ route('dashboard') }}">dashboard</a>
<a href="{{ route('user.ajuan.index') }}">List Ajuan</a>
