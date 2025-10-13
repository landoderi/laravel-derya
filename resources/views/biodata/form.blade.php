<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $biodatum->nama ?? '') }}">
</div>

<div class="mb-3">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $biodatum->tgl_lahir ?? '') }}">
</div>

<div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="jk" class="form-control">
        <option value="Laki-laki" {{ (old('jk', $biodatum->jk ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ (old('jk', $biodatum->jk ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="mb-3">
    <label>Agama</label>
    <input type="text" name="agama" class="form-control" value="{{ old('agama', $biodatum->agama ?? '') }}">
</div>

<div class="mb-3">
    <label>Foto</label><br>
    @if(!empty($biodatum->foto))
        <img src="{{ asset('storage/'.$biodatum->foto) }}" width="80"><br>
    @endif
    <input type="file" name="foto" class="form-control mt-2">
</div>

<div class="mb-3">
    <label>Tinggi Badan (cm)</label>
    <input type="number" name="tinggi_badan" class="form-control" value="{{ old('tinggi_badan', $biodatum->tinggi_badan ?? '') }}">
</div>

<div class="mb-3">
    <label>Berat Badan (kg)</label>
    <input type="number" name="berat_badan" class="form-control" value="{{ old('berat_badan', $biodatum->berat_badan ?? '') }}">
</div>
