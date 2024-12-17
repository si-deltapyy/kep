<form action="{{ route('admin.template.update'), $data->id }}" method="POST" enctype="multipart/form-data">

    <label for="Rumpun">Rumpun</label>
    <select name="" id="Rumpun">
        <option value="">Pilih Rumpun</option>
        @foreach ($type as $option)
            <option value="{{ $option->id }}">{{ $option->ajuan_name }}</option>
        @endforeach
    </select>
    <label for="Template">Template</label>
    <input type="text" id="Template" value="{{ $data->template_name }}">

    <label for="File">File</label>
    <input type="file" id="File">
    
    <button type="submit">Update</button>
</form>
