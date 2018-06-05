<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-distribusi-walikelas" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Tentukan pembagian kelas untuk walikelas</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-distribusi-walikelas" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group" style = "display:none">
                            <label class="col-md-2 control-label">Id Jabatan</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control"  id="txt_id_jabatan" name="txt_id_jabatan" readonly>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Guru</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_nama_guru" name ="slc_nama_guru">                 
                                    <option value="">Pilih guru </option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-2 control-label">Kelas</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_kelas" name ="slc_kelas">                 
                                    <option value="">Pilih kelas</option>
                                </select>
                            </div>
                        </div>                     
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-distribusi-walikelas" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

