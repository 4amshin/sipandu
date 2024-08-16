<div class="modal fade" id="inputKematianModal" tabindex="-1" role="dialog" aria-labelledby="inputKematianModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('penduduk.tandaiMeninggal', ':id') }}"">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="inputKematianModalTitle">Tandai Meninggal</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Tempat-->
                    <div class="form-group">
                        <label for="tempat_kematian">Tempat Kematian</label>
                        <input type="text" name="tempat_kematian" id="tempat_kematian" class="form-control" required>
                    </div>

                    <!--Jam-->
                    <div class="form-group">
                        <label for="jam_kematian">Jam Kematian</label>
                        <input type="time" name="jam_kematian" id="jam_kematian" class="form-control" required>
                    </div>

                    <!--Tanggal-->
                    <div class="form-group">
                        <label for="tanggal_kematian">Tanggal Kematian</label>
                        <input type="date" name="tanggal_kematian" id="tanggal_kematian" class="form-control"
                            required>
                    </div>

                    <!--Sebab-->
                    <div class="form-group">
                        <label for="sebab">Sebab Kematian</label>
                        <input type="text" name="sebab" id="sebab" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
