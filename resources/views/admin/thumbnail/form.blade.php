<input type="hidden" name="id" id="id">
<div class="form-group">
    <label class="col-form-label" for="judul">Judul</label>
    <input type="text" class="form-control @error ('judul') is-invalid @enderror" placeholder="Masukkan Judul" name="judul" value="{{old('judul')}}" id="judul" autofocus>
    @error('judul')<div class="invalid-feedback"> {{$message}} </div>@enderror
</div>
<div class="form-group">
    <label for="tgl_mulai">Tanggal Mulai Etalase</label>
    <input type="date" id="tgl_mulai" class="form-control  @error ('tgl_mulai') is-invalid @enderror" name="tgl_mulai" value="{{old('tgl_mulai')}}">
    <p>Note : Masukkan Waktu Aktif Etalase.</p>
</div>
<div class="form-group">
    <label for="tgl_akhir">Tanggal Berakhir Etalase</label>
    <input type="date" id="tgl_akhir" class="form-control  @error ('tgl_akhir') is-invalid @enderror" name="tgl_akhir" value="{{old('tgl_akhir')}}">
    <p>Note : Masukkan Waktu Aktif Etalase.</p>
</div>
<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea id="keterangan" class="form-control  @error ('keterangan') is-invalid @enderror" name="keterangan" placeholder="Masukkan Keterangan" autofocus>{{old('keterangan')}}</textarea>
</div>
<div class="form-group">
    <label for="pict">Gambar </label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="pict" id="pict" value="{{old('pict')}}">
        <label class="custom-file-label" for="pict">Choose file</label>
        <p>Note : Masukkan Gambar jika ingin mengubah Gambar</p>
    </div>
</div>

<div style="padding-top:30px; margin-left:96px; display:inline-block;">
    <img src="/img/nopict.png" id="pict" style=" width:450px; height:300px; ">
</div>
<div class="imgWrap" style="padding-top:30px; margin-left:96px; display:inline-block;">
    <img src="/img/nopict.png" id="gambar_nodin" alt="Preview Gambar" style=" width:450px; height:300px; ">
</div>