<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-tak-terjadi-realisasi"  data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Realisasi Tidak terjadi</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-tak-terjadi-bimbingan" class="form-horizontal" role="form" method="POST">
                    <div class="form-body"> 
                        <div class="form-group" style="display:none">  
                            <div class="col-md-3">
                                <label>Id pengajuan </label>   
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly="" id="txt_id_pengajuan" name="txt_id_pengajuan">
                            </div>
                        </div> 
                        <div class="form-group" style="">  
                            <div class="col-md-3">
                                <label>Status realisasi</label>   
                            </div>  
                            <div class="col-md-9">
                                <select class="form-control" id= "txt_status_realisasi" name ="txt_status_realisasi">     
                                        <option value="">Pilih alasan</option>            
                                </select>
                            </div>
                        </div>                                                                
                        <div class="form-group">   
                            <div class="col-md-3">
                                <label>Keterangan Tambahan</label>   
                            </div>     
                            <div class="col-md-9">
                                <textarea class="form-control" rows="4" id="txt_tak_terjadi_realisasi" name="txt_tak_terjadi_realisasi"></textarea>
                            </div>
                        </div>                                                             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-tak-terjadi" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

