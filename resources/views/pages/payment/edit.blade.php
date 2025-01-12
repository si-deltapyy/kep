<h2>Bayar pada : xxxxxxx</h2>

<form action="{{ route('user.payment.update', $payment->id) }}" method="POST" has-file enctype="multipart/form-data">
    @csrf
    @method('PUT')
    Metode 
    <Select name="metode" id="metode" class="form-control">
        <option value="0">-- Pilih Metode --</option>
        <option value="transfer">Transfer Bank</option>
        <option value="e-wallet">e-wallet</option>
        {{-- <option value="VA">Virtual Account</option> --}}
    </Select>
    <input type="file" name="proof" id=""  accept=".jpg , .png">
    <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
</form>


