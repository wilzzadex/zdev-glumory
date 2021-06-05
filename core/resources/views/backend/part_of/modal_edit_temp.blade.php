<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formBarangEdit">
            <div class="modal-body">
                <div class="form-group">

                    <label>Barang</label><br>
                    <input type="hidden" name="id" value="{{ $temp->id }}">
                    <select name="barang_id_edit" style="width: 100%" id="barang" class="form-control">
                        <option value="">- Pilih Barang -</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $temp->barang_id ? 'selected' : '' }}>{{ $item->nama_barang }} | Rp.
                                {{ $item->harga }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" class="form-control" name="qty_edit" value="{{ $temp->qty }}" min="1" placeholder="Masukan jumlah barang">
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </form>
    </div>
</div>
