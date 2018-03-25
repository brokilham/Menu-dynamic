<div class="modal fade bs-modal-sm" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-update-mstr-privilages" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kelas</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control"  id="txt_kelas_updt" name="txt_kelas_updt" >
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Ruang</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control"  id="txt_ruang_updt" name="txt_ruang_updt" >
                                </div>
                            </div>
                        <div class="form-group" style="display:none">
                            <label class="col-md-3 control-label">Id</label>
                            <div class="col-md-7">
                                <input type="text"  id = "txt_id_updt" name="txt_id_updt" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-update-mstr-privilages">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- desain modal yang lama
    <div class="modal fade" id="modal-update" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-body"> 
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">update Master Privilages</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form id = "frm-update-mstr-privilages" class="form-horizontal" role="form" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control"  id="txt_name_updt" name="txt_name_updt" >
                                    </div>
                                </div>
                                <div class="form-group" style="display:none">
                                    <label class="col-md-3 control-label">Id</label>
                                    <div class="col-md-7">
                                        <input type="text"  id = "txt_status_id_updt" name="txt_status_id_updt" >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                                                                   
                </div>                                                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-update-mstr-privilages">Save</button>
            </div>
        </div>
    </div>
</div>
-->