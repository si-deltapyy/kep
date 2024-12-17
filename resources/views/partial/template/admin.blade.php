<a href="{{ route('admin.template.create') }}">Tambah Template</a><br>

@if ($temp->isEmpty())
    <p>Belum ada template</p>
@else
@foreach ($temp as $x)
    {{ $x->template_name }}
    <a href="{{ route('admin.template.edit', $x->id) }}">Edit</a>
@endforeach
@endif
