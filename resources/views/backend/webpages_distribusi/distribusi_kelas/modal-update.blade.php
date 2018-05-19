<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-update-distribusi-kelas" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">A Fairly Long Modal</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-update-distribusi-kelas" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group"  style="display:none">
                                <label class="col-md-2 control-label">  Id</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control"  id="txt_id_updt" name="txt_id_updt" readonly>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">  Id</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_id_siswa_updt" name="txt_id_siswa_updt" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_nama_updt" name="txt_nama_updt" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Kelas</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_kelas_updt" name ="slc_kelas_updt">                 
                                </select>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-update-distribusi-kelas" name="btn-update-distribusi-kelas" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

