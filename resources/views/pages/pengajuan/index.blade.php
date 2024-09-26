<div>
    Simplicity is the essence of happiness. - Cedric Bledsoe
</div>
<div>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Judul Usulan</td>
                <td>Pengusul</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $x)
            <tr>
                <td>-</td>
                <td>{{$x->title}}</td>
                <td>{{$x->user_id}}</td>
                <td>{{$x->doc_status}}</td>
                <td>
                    @if($x->doc_status == 'new-proposal')
                    <a href="{{ route('sekretariat.pengajuan.show', $x->doc_group) }}">Lihat Dokumen</a>
                    @elseif($x->doc_status == 'on-review')
                    <a href="{{ route('sekretariat.pengajuan.show', $x->doc_group) }}">Cek</a>
                    @elseif($x->doc_status == 'approved')
                    <a href="{{ route('sekretariat.upload.ec', $x->doc_group) }}">Kelola EC</a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


