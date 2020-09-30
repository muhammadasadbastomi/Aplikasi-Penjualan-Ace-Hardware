<div class="modal fade text-left" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('homeStore') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barang">Pilih Barang</label>
                            <select class="custom-select" name="barang_id" id="barang_id">
                                @foreach($baranglist as $l)
                                <option value="{{$l->id}}">{{ $l->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Jumlah Order</label>
                        <div class="form-group">
                            <input type="number" name="jumlah_order" id="jumlah_order" placeholder="Masukkan Jumlah"
                                value="{{old('jumlah_order')}}"
                                class="form-control  @error ('jumlah_order') is-invalid @enderror">
                            @error('jumlah_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Nama</label>
                        <div class="form-group">
                            <input type="text" name="nama_order" id="nama_order" placeholder="Masukkan nama"
                                value="{{old('nama_order')}}"
                                class="form-control  @error ('nama_order') is-invalid @enderror">
                            @error('nama_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <input type="text" name="alamat_order" id="alamat_order" placeholder="Masukkan alamat"
                                value="{{old('alamat_order')}}"
                                class="form-control  @error ('alamat_order') is-invalid @enderror">
                            @error('alamat_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Nomor telepon</label>
                        <div class="form-group">
                            <input type="number" name="telp_order" id="telp_order" placeholder="Masukkan telepon"
                                value="{{old('telp_order')}}"
                                class="form-control  @error ('telp_order') is-invalid @enderror">
                            @error('telp_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>email</label>
                        <div class="form-group">
                            <input type="text" name="email_order" id="email_order" placeholder="Masukkan email"
                                value="{{old('email_order')}}"
                                class="form-control  @error ('email_order') is-invalid @enderror">
                            @error('email_order')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
