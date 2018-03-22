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