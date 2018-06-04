<!-- /.modal -->
<div class="modal fade bs-modal-sm" id="modal-add-mstr-jabatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Master Jabatan</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-mstr-jabatan" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Login As</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"  id="txt_login_as" name="txt_login_as" readonly >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"  id="txt_name" name="txt_name" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-mstr-jabatan" value=''>Save</button>  
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
