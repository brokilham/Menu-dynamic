<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-update" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">A Fairly Long Modal</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-update-mstr-guru" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">  Id</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_id_updt" name="txt_id_updt" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_nama_updt" name="txt_nama_updt" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Alamat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_alamat_updt" name="txt_alamat_updt" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">No telp</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_no_telp_updt" name="txt_no_telp_updt" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">No Email</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_email_updt" name="txt_email_updt" >
                            </div>
                        </div>
                        <div class="form-group" style="display:none">
                            <label class="col-md-2 control-label">Status</label>
                            <div class="col-md-10">
                                <select class="form-control"  id = "txt_status_updt" name="txt_status_updt" >
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
                <button type="button" class="btn green" id="btn-update-mstr-guru" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

