
<table border="1">
    <thead>
        <tr>
            <td>No</td>
            <td>Judul Dokumen</td>
            <td>Status</td>
            @foreach($dummy as $x)
            @if($x->doc_status == 'new-proposal')
            <td>Action</td>
            <td>Reviewer</td>
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
            <form action="{{route('sekretariat.pengajuan.post', $x->doc_group)}}" method="post">
                    @csrf
                    <select name="review[]" multiple>
                        <option value="0">-- Pilih Reviewer --</option>
                        @foreach($reviewer as $xa)
                        <option value="{{$xa->id}}">{{$xa->name}}</option>
                        @endforeach
                    </select>
            </td>
            <td>
                <button type="submit">assign reviewer</button>
            </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>










