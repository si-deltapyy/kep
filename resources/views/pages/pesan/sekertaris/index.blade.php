<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Review</th>
                <th>Reviewer ID</th>
                <th>Document ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesan as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>{{ $p->updated_at }}</td>
                    <td>{{ $p->review }}</td>
                    <td>{{ $p->reviewer_id }}</td>
                    <td>{{ $p->dummy_id }}</td>
                    <td><a href="{{route('message.show', $p->dummy_id)}}">show</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
