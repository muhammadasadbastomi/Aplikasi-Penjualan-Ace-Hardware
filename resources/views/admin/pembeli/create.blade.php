<div class="modal fade text-left" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Data Pembeli</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_pembeli">Nama Pembeli</label>
                            <input type="text" id="nama" class="form-control  @error ('nama_pembeli') is-invalid @enderror" placeholder="Masukkan Nama Pembeli" name="nama_pembeli" value="{{old('nama_pembeli')}}">
                            @error('nama_pembeli')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" placeholder="Masukkan E-Mail" id="email" class="form-control  @error ('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                            @error('email')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telepon</label>
                            <input type="number" id="telp" class="form-control  @error ('telp') is-invalid @enderror" name="telp" placeholder="Masukkan Nomor Telepon" value="{{old('telp')}}">
                            @error('telp')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Pembeli</label>
                            <textarea id="alamat" class="form-control  @error ('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan alamat">{{old('alamat')}}</textarea>
                            @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>