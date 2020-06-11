<div class="modal fade" id="modaldiskon" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Cetak Berdasarkan Angka Diskon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="{{route('angkadiskonCetak')}}" target="_blank">
                    {{ method_field('put') }}
                    @csrf
                    <div class="modal-body">
                        <label for="diskon">Masukkan Angka Diskon</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="diskon" id="diskon" aria-describedby="basic-addon2" aria-label="Recipient's username" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary"> <i class="feather icon-printer"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="modalsupplier" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Cetak Berdasarkan Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="{{route('barangsupplierCetak')}}" target="_blank">
                    {{ method_field('put') }}
                    @csrf
                    <div class="modal-body">
                        <label for="barangsupplier">Pilih Suplier</label>
                        <div class="form-group">
                            <select class=" custom-select" name="barangsupplier" id="barangsupplier">
                                @foreach($supplier as $s)
                                <option value="{{$s->id}}">{{ $s->supplier}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary"> <i class="feather icon-printer"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>