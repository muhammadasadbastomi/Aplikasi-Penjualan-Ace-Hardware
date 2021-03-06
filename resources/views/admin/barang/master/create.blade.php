<form method="POST" enctype="multipart/form-data">
    <div class="body">
        @csrf
        <label>Nama Barang</label>
        <div class="form-group">
            <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang"
                value="{{old('nama_barang')}}" class="form-control  @error ('nama_barang') is-invalid @enderror">
            @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div>

        <label>Kode Barang</label>
        <div class="form-group">
            <input type="text" name="kode_barang" id="kode_barang" placeholder="Masukkan kode Barang"
                value="{{old('kode_barang')}}" class="form-control  @error ('kode_barang') is-invalid @enderror">
            @error('kode_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div>

        <div class="form-group">
            <label for="supplier">Supplier</label>
            <select class="custom-select" name="supplier_id" id="supplier_id">
                @foreach($supplier as $s)
                <option value="{{$s->id}}">{{ $s->supplier}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="supplier">Satuan</label>
            <select class="custom-select" name="satuan_id" id="satuan_id">
                @foreach($satuan as $s)
                <option value="{{$s->id}}">{{ $s->nama_satuan}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="custom-select" name="kategori" id="kategori">
                <option selected value="">Pilih kategori</option>
                <option value="1">Alat Rumah</option>
                <option value="2">Alat Kebersihan</option>
                <option value="3">Dapur</option>
                <option value="4">Otomotif</option>
                <option value="5">Peralatan Elektronik</option>
                <option value="6">Olahraga & Outdoor</option>
                <option value="7">Lain-lain</option>
            </select>
        </div>

        <label>Departement</label>
        <div class="form-group">
            <input type="text" name="departement" id="departement" placeholder="Masukkan Departement"
                value="{{old('departement')}}" class="form-control">
            @error('departement')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div>

        <!-- <label>Watku Aktif</label>
        <div class="form-group">
            <input type="date" name="tgl_aktif" id="tgl_aktif" value="{{old('tgl_aktif')}}" class="form-control">
             <p>Note : Masukkan Masa Tanggal Aktif Diskon/Berakhirnya Tanggal Diskon.</p>
            @error('tgl_aktif')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div> -->

        <label>Harga</label>
        <div class="form-group">
            <input type="number" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga"
                value="{{old('harga_jual')}}" class="form-control">
            @error('harga_jual')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div>


        <label>Stok</label>
        <div class="form-group">
            <input type="number" name="stok_tersedia" id="stok_tersedia" placeholder="Masukkan Stok"
                value="{{old('stok_tersedia')}}" class="form-control ">
            @error('stok_tersedia')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div>

        <label>Deskripsi</label>
        <div class="form-group">
            <textarea type="text" name="keterangan" id="keterangan" placeholder="Masukkan Deskripsi"
                value="{{old('keterangan')}}" class="form-control"></textarea>
            @error('keterangan')<div class="invalid-feedback"> {{$message}} </div>@enderror
        </div>

        <div class="form-group">
            <label for="gambar">Gambar </label>
            <div class="custom-file">
                <input type="file" id="gambar" class="custom-file-input  @error ('gambar') is-invalid @enderror"
                    name="gambar" value="{{old('gambar')}}">
                <label class="custom-file-label" for="gambar">Choose file</label>
                @error('gambar')<div class="invalid-feedback"> {{$message}} </div>@enderror
            </div>
        </div>
        <br>
        <div class="imgWrap">
            <img src="/img/nopictcreate.png" id="imgView" class="card-img-top img-fluid"
                style="width: 30%; height:30%; display: block; margin: auto;">
        </div>
        <br>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>
