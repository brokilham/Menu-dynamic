<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-mstr-jadwal" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Tambah Jadwal Aktif</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-mstr-jadwal" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hari</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_hari" name ="slc_hari">                 
                                    <option value="">Pilih hari</option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>           
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-2 control-label">Jam</label>
                            <div class="col-md-10">
                                <select class="form-control" id= "slc_jam" name ="slc_jam">                 
                                    <option value="">Pilih jam</option>
                                   <!-- <option value="1">07.30 - 08.00</option>
                                    <option value="2">08.30 - 09.00</option>
                                    <option value="3">09.30 - 10.00</option>
                                    <option value="4">10.30 - 11.00</option>
                                    <option value="5">11.30 - 12.00</option>-->
                                </select>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-mstr-jadwal" name ="btn-submit-mstr-jadwal" value='' >Save</button>  
            </div>
        </div>
    </div>
</div>

