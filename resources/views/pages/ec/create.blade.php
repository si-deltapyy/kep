<form action="{{ route('sekertaris.ec.store') }}" method="POST" has-file enctype="multipart/form-data">
    @csrf

    <input id="title" name="id" type="text" value="{{ $data->id}}" hidden>
    <input id="title" name="user" type="text" value="{{ $user->id }}" hidden>
    <label for="title">Judul Ajuan</label>
    <input id="title" name="title" type="text" value="{{ $data->title }}" readonly muted>

    <label for="name">Name</label>
    <input id="name" name="name" type="text" value="{{ $user->name }}" readonly muted>

    <label for="file">Upload EC</label>
    <input id="file" name="file" type="file" accept=".pdf">

    <button type="submit">Upload</button>
</form>
