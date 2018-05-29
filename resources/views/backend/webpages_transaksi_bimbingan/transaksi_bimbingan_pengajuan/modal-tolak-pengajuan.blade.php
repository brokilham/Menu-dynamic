<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-tolak-pengajuan"  data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Alasan Penolakan</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-tolak-pengajuan-bimbingan" class="form-horizontal" role="form" method="POST">
                    <div class="form-body"> 
                        <div class="form-group" style="display:none">  
                            <div class="col-md-3">
                                <label>Id pengajuan </label>   
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly="" id="txt_id_pengajuan" name="txt_id_pengajuan">
                            </div>
                        </div> 
                        <div class="form-group" style="display:none">  
                            <div class="col-md-3">
                                <label>Status approval</label>   
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly="" id="txt_status_approval" name="txt_status_approval" value ="2">
                            </div>
                        </div>                                                                
                        <div class="form-group">       
                            <div class="col-md-12">
                                <textarea class="form-control" rows="4" id="txt_tolak_pengajuan" name="txt_tolak_pengajuan"></textarea>
                            </div>
                        </div>                                                             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-tolak-pengajuan" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

