<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-mstr-guru" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Master Data</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-mstr-guru" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">  Id</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control required"  id="txt_id" name="txt_id" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required"  id="txt_nama" name="txt_nama" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Alamat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control required"  id="txt_alamat" name="txt_alamat" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label ">No telp</label>
                            <div class="col-md-10">
                                <input type="number" class="form-control required"  id="txt_no_telp" name="txt_no_telp" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">No Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control required"  id="txt_email" name="txt_email" >
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

