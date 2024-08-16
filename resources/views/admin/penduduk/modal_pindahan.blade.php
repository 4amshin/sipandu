<div class="modal fade" id="modalPindah" tabindex="-1" role="dialog" aria-labelledby="modalPindahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPindahTitle">Tandai Pindah</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('penduduk.tandaiPindah', ':id') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_pindah">Tanggal Pindah</label>
                        <input type="date" class="form-control" id="tanggal_pindah" name="tanggal_pindah" required>
                    </div>
                    <div class="form-group">
                        <label for="alasan_pindah">Alasan Pindah</label>
                        <textarea class="form-control" id="alasan_pindah" name="alasan_pindah" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
