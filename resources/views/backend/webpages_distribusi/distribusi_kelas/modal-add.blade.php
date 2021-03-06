<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-distribusi-kelas"  data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Tentukan kelas siswa</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-distribusi-kelas" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Siswa</label>
                                <div class="col-md-10">
                                    <select class="form-control select2" id= "slc_nama_siswa" name ="slc_nama_siswa">                 
                                        <option value="">Pilih Siswa</option>
                                    </select>
                                    <!--
                                        <input type="text" class="form-control"  id="txt_id" name="txt_id" >
                                    -->
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-2 control-label">Kelas</label>
                                <div class="col-md-10">
                                    <select class="form-control" id= "slc_kelas" name ="slc_kelas">                 
                                        <option value="">Pilih Kelas</option>
                                    </select>
                                    <!--
                                        <input type="text" class="form-control"  id="txt_id" name="txt_id" >
                                    -->
                                </div>
                            </div> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-distribusi-kelas" name ="btn-submit-distribusi-kelas" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

