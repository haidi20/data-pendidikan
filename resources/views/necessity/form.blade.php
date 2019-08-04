<div class="modal fade" id="modal-edit" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title edit title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-guest-group">
                    <input type="hidden" id="id">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control name" name="name" id="name" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-xs" onClick="send()">Kirim</button>
                    {{-- <a href="#" class="btn btn-success btn-sx" onClick="send()">Kirim</a> --}}
                </form>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-default btn-info waves-effect " data-dismiss="modal">Keluar</button> --}}
            </div>
        </div>
    </div>
</div>