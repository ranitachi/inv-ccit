<div class="modal fade" id="modaleditprofile" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Profile Saya</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Nama" required value="">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email" required value="">
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