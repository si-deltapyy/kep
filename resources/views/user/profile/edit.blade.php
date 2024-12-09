{{-- profil hanya sekali update saja --}}
<div>
    <form action="{{route('user.profile.update', Auth::user()->id)}}" method="post">
        @csrf
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{$data->name}}" required><br>

        <label for="nik">NIK</label>
        <input id="nik" type="text" name="nik" placeholder="Masukkan NIK" required><br>

        <label for="no">Nomor Telepon</label>
        <input id="no" type="text" name="no" placeholder="08xxxxxxxx" required><br>

        <label for="prodi">Prodi</label>
        <select name="prodi" id="prodi">
            <option value="">-- Select --</option>
            @foreach($prodi as $x)
            <option value="{{$x->id}}">{{$x->name}}</option>
            @endforeach
        </select><br>

        <label for="jl">Jenis Kelamin</label>
        <select name="jl" id="jl">
            <option value="">-- Select --</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan">Perempuan</option>
        </select><br>

        <label for="sts">Status</label>
        <select name="sts" id="sts">
            <option value="">-- Select --</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Dosen">Dosen</option>
        </select><br>

        <label for="addr">Alamat</label>
        <textarea name="addr" id="addr" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea><br>

        <button type="submit">Update Profil</button>

    </form>
</div>
