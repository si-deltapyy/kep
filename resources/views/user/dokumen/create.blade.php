<form action="{{ route('ajuan.save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="pengusul">Judul Usulan: </label>
    <input id="pengusul" type="text" class="form-control" name="pengusul" required><br>

    @foreach($type as $x)
    <label for="doc{{$x->id}}">Upload {{$x->name}}: </label>
    <input id="doc{{$x->id}}" type="file" class="form-control" name="doc{{$x->id}}" accept=".docx, .pdf, .doc" ><br>
    @endforeach
    
    <button type="submit">Upload</button>
</form>
<a href="{{ route('dashboard') }}">dashboard</a>
