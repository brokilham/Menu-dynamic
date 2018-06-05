<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-distribusi-jadwal" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Pilih jadwal untuk dilakukan bimbingan</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-distribusi-jadwal" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group" style = "display:none">
                            <label class="col-md-2 control-label">Id Guru BK</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_id_guru_bk" name="txt_id_guru_bk" readonly>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hari</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_hari" name ="slc_hari">                 
                                    <option value="">Pilih hari</option>                             
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-2 control-label">Jam</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_jam" name ="slc_jam">     
                                    <option value="">Pilih jam</option>            
                                </select>
                            </div>
                        </div>                     
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-distribusi-jadwal" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

