<div class="modal fade" id="modaleditpassword" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Password Saya</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="old_password" type="password" class="form-control" placeholder="Password Lama" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="Password Baru">
                    </div>
                    <div class="form-group">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password Baru">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>