<div>
    Simplicity is the essence of happiness. - Cedric Bledsoe
</div>
<div>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul Usulan</td>
                <td>Opsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $x)
            <tr>
                <td>-</td>
                <td>{{$x->title}}</td>
                <td>{{$x->created_at}}</td>
                <td>
                    <a href="{{ route('reviewer.pengajuan.show', $x->doc_group) }}">Detail</a>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="/dashboard">back</a>
