
<table border="1">
    <thead>
        <tr>
            <td>No</td>
            <td>Judul Dokumen</td>
            <td>Status</td>
            @foreach($dummy as $x)
                @if($x->doc_status == 'new-proposal')
                <td>Action</td>
                @elseif($x->doc_status == 'on-review')
                <td>Note</td>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($dummy as $x)
        <tr>
            <td>{{$x->id}}</td>
            <td>{{$x->title}}<br>
                @foreach($doc as $xp)
                    - {{$xp->doc_name}}
                    @if($x->doc_status == 'new-proposal')
                    <a href="/storage/{{$x->doc_path}}" target="_blank" rel="noopener noreferrer">**</a>
                    @endif
                    <br>
                @endforeach
            </td>
            <td>{{$x->doc_status}}</td>
            @if($x->doc_status == 'new-proposal')
                <td>
                    <a href="{{ route('sekretariat.pengajuan.expedited', $x->doc_group) }}">Expedited</a>
                    <a href="{{ route('sekretariat.pengajuan.extempted', $x->doc_group) }}">Extempted</a>
                    <a href="{{ route('sekretariat.pengajuan.all', $x->doc_group) }}">All Review</a>
                </td>
                @elseif($x->doc_status == 'on-review')
                <td>Note</td>
                @endif
        </tr>
        @endforeach
    </tbody>
</table>










