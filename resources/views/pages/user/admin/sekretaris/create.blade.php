<form action="{{ route('admin.sekertaris.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nama Sekretaris</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Sekretaris">
    </div>
    <div class="form-group">
        <label for="email">Email Sekretaris</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email Sekretaris">
    </div>
    <div class="form-group">
        <label for="password">Password Sekretaris</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password Sekretaris">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
