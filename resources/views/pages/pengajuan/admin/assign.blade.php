

<table>
    <thead>
        <tr>
            <th>Assign</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <select name="" id="">
                    <option value="">Pilih Reviewer</option>
                    @foreach ($sekertaris as $option)
                        <option value="{{ $option->id }}">{{ $option->name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </tbody>
</table>
