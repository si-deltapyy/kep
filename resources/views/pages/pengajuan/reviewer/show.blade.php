<div>
    Simplicity is the essence of happiness. - Cedric Bledsoe
</div>
<div>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul Usulan</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $x)
            <tr>
                <td>-</td>
                <td>{{$x->doc_name}} - <a href="/storage/{{$x->doc_path}}">Unduh</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="/reviewer/pengajuan/">back</a>
