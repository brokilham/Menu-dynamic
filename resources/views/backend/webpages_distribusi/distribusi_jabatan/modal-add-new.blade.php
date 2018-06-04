<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-distribusi-jabatan" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Pilih jabatan untuk guru</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-distribusi-jabatan" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"> Nama Guru</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_nama_guru" name ="slc_nama_guru">                 
                                    <option value = "">pilih guru</option>
                                </select>
                                <!--<input type="text" class="form-control"  id="txt_nama" name="txt_nama" >-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Jabatan</label>
                            <div class="col-md-10">
                                <select class="form-control" id="slc_jabatan" name="slc_jabatan">                      
                                    <option value = "">pilih jabatan</option>
                                </select>
                                    
                                <!--
                                <input type="text" class="form-control"  id="txt_jabatan" name="txt_jabatan" >
                                -->
                            </div>
                        </div>             
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-distribusi-jabatan" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

