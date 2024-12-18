<form action="{{ route('admin.template.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label for="Rumpun">Rumpun</label>
    <select name="ajuan" id="Rumpun">
        <option value="">Pilih Rumpun</option>
        @foreach ($type as $option)
            <option value="{{ $option->id }}">{{ $option->ajuan_name }}</option>
        @endforeach
    </select>
    <label for="Template">Template</label>
    <input type="text" name="tempName" id="Template" value="{{ $data->template_name }}">

    <label for="File">File</label>
    <input type="file" name="tempFile" id="File">
    
    <button type="submit">Update</button>
</form>
