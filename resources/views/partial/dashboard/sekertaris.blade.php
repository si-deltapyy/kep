@can('update-password')
    <h3>Ubah Passwordmu Dahulu</h3>
    <form action="{{ route('sekertaris.update-password') }}" method="POST">
        <div class="form-group">
            <label for="password">Password Lama</label>
            <input type="password" class="form-control" name="password_old" id="password" placeholder="Password Lama">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password Baru">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-key mr-2"></i>Ubah Password</button>
    </form>
        
@endcan

@can('done-password')
    <a href="{{ route('sekertaris.password') }}" class="dropdown-item">
        <i class="fas fa-key mr-2"></i>Password Telah Diubah
    </a>
@endcan
