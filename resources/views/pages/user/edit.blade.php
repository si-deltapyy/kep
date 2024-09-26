<form action="{{route('sekretariat.review.update', $user->id)}}" method="post">
    @csrf
    @method('PUT')
    <label for="">Name</label>
    <input id="" type="text" name="name" value="{{$user->name}}">

    <label for="">Email</label>
    <input id="" type="text" name="email" value="{{$user->email}}">

    <button type="submit">Update</button>
</form>

