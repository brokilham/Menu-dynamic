<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-ubah-password" tabindex="-1" data-replace="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>
                <div class="modal-body">
                    <form id = "frm-ubah-password" class="form-horizontal" role="form" method="POST">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Username</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control required"  id="txt_username" name="txt_username" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Password Baru</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control required"  id="txt_password" name="txt_password" value = "">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="button" class="btn green" id="btn-submit-ubah-password" value=''>Save</button>  
                </div>
            </div>
        </div>
    </div>
    
    