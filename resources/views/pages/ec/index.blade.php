<table border="1">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Dokumen</td>
            <td>Pengusul</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($doc as $x)
        <tr>
            <td> - </td>
            <td> {{$x->doc_name}} </td>
            <td> {{$x->name}} </td>
            <td>
                <a href="">Lihat Dokumen</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="/dashboard">back</a>