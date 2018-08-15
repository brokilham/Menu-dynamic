<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-setujui-pengajuan"  data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Form setujui Bimbingan</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-setujui-pengajuan-bimbingan" class="form-horizontal" role="form" method="POST">
                    <div class="form-body"> 
                        <div class="form-group" style="display:none">  
                            <div class="col-md-3">
                                <label>Id pengajuan </label>   
                            </div>  
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly="" id="txt_id_pengajuan" name="txt_id_pengajuan">
                            </div>
                        </div> 
                        <div class="form-group" style="display:"> 
                            <div class="col-md-3">
                                <label>Kategori Topik </label>   
                            </div>  
                            <div class="col-md-9">
                                 <select class="form-control" id="slc_kategori_topik" name="slc_kategori_topik">                                                     
                                    <option value = "akademik">Akademik</option>
                                    <option value = "keuangan">Keuangan</option>
                                    <option value = "pribadi">Pribadi</option>                               
                                    <option value = "sosial">Sosial</option>
                                </select>
                            </div>         
                        </div>                                                                                                                          
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-setujui-pengajuan" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

