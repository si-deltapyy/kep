@if ($temp->isEmpty())
    <div class="alert alert-warning">
        <strong>Maaf!</strong> Tidak ada data yang tersedia.
    </div>
@else
    @foreach ($temp as $data)
        <h1>{{ $data->typeAjuan->ajuan_name }}</h1>
        <a href="/storage/{{ $data->template_path }}">Download - {{ $data->template_name }}</a>
    @endforeach
@endif