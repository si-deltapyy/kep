<table border="1">
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $x)
        <tr>
            <td>{{$x->name}}</td>
            <td>{{$x->email}}</td>
            <td>
                <form action="{{route('sekretariat.review.destroy', $x->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
                <a href="{{route('sekretariat.review.edit', $x->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
