Jumlah Sekertaris yang dikasih Dokumen
<h2>{{ $sekertaris[0]['name'] }} :</h2><p>{{ $num['sek1'] }}</p><br>
<h2>{{ $sekertaris[1]['name'] }} :</h2><p>{{ $num['sek2'] }}</p><br>
<h2>{{ $sekertaris[2]['name'] }} :</h2><p>{{ $num['sek3'] }}</p><br>

<table>
    <thead>
        <tr>
            <th>Assign Dokumen</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <form action="{{ route('admin.pengajuan.store')}}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{ $data->id }}" hidden>
                    <label for="">Sekertaris</label>    
                    <select name="sekertaris" id="">
                        <option value="">Pilih Sekertaris</option>
                        @foreach ($sekertaris as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Assign</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>



