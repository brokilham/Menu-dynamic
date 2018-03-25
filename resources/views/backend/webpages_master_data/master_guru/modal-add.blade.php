<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">A Fairly Long Modal</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-mstr-guru" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">  Id</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_id" name="txt_id" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_nama" name="txt_nama" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Alamat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_alamat" name="txt_alamat" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">No telp</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_no_telp" name="txt_no_telp" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">No Email</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_email" name="txt_email" >
                            </div>
                        </div>
                        <div class="form-group" style="display:none">
                            <label class="col-md-2 control-label">Status</label>
                            <div class="col-md-10">
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
                <button type="button" class="btn green" id="btn-submit-mstr-guru" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

