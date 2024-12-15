

@foreach ($user as $x)
<table>
    <tr>
        {{ $x->name }}
        {{ $x->email }}
        <a href="{{ route('admin.sekertaris.create') }}">Edit</a>
    </tr>
</table>

    
@endforeach