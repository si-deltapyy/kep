<form action="{{ route('post_tes') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="upload" id="">
    <button type="submit">submit</button>
</form>
