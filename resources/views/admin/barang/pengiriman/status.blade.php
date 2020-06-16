<!-- Modal Edit -->
<div class="modal fade text-left" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollable" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollable" style="padding-left: 10px;">Edit Status Pengiriman Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('statusUpdate')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label for="status">Status Barang</label>
                            <select class="custom-select" name="status" id="status">
                                <option value="{{$d->status}}" selected>
                                    @if($d->status == 1)
                                    Packing
                                    @elseif($d->status == 2)
                                    Dalam Pengiriman
                                    @elseif($d->status == 3)
                                    Terkirim
                                    @endif
                                <option value="1">Packing</option>
                                <option value="2">Dalam Pengiriman</option>
                                <option value="3">Terkirim</option>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>