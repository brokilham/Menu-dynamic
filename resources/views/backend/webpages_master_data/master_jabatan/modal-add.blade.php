<!-- /.modal -->
<div class="modal fade bs-modal-sm" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <label class="col-md-3 control-label">Nama</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  id="txt_name" name="txt_name" >
                            </div>
                        </div>
                        <div class="form-group" style="display:none">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-7">
                                <select class="form-control"  id = "txt_status" name="txt_status" >
                                    <option value = "active">Active</option>
                                    <option value = "non_Active">Non Active</option>
                                </select>
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
