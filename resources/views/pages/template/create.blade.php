<form action="{{ route('admin.template.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="tempName">Nama Template</label>
    <input type="text" name="tempName" class="form-control" id="tempName" required>
    
    <label for="tempFile">File Template</label>
    <input type="file" name="tempFile" class="form-control" id="tempFile" required>
    
    <select name="ajuan" id="ajuan">
        <option value="">-- Pilih Jenis Ajuan --</option>
        @foreach ($type as $x)
            <option value="{{ $x->id }}">{{ $x->ajuan_name }}</option>
        @endforeach
    </select>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
