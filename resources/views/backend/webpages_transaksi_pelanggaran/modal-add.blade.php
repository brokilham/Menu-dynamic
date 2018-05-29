<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-add-transaksi-pelanggaran"  data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">A Fairly Long Modal</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-add-transaksi-pelanggaran" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Id Siswa</label>
                            <div class="col-md-5">
                                <select id="slc2_siswa" name="slc2_siswa" class="form-control select2">
                                    <option value="0">Pilih siswa</option>                                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Tgl Kejadian</label>
                            <div class="col-md-9">
                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                    <input type="text" class="form-control" readonly="" id="txt_tgl_kejadian" name="txt_tgl_kejadian">
                                    <span class="input-group-btn">
                                        <button class="btn default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Lokasi Kejadian</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control"  id="txt_lokasi_kejadian" name="txt_lokasi_kejadian" >
                            </div>
                        </div> 
                        <div class="form-group" >
                            <label class="col-md-3 control-label">Jenis Pelanggaran</label>
                            <div class="col-md-9">
                                <select class="form-control" id= "slc_jenis_pelanggaran" name ="slc_jenis_pelanggaran">                 
                                    <option value="">Pilih jenis pelanggaran</option>   
                                    <option value="ringan">Ringan</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="berat">Berat</option>                             
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Pelanggaran</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="4" id="txt_ket_pelanggaran" name="txt_ket_pelanggaran"></textarea>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Pendisiplinan</label>
                            <div class="col-md-9">
                                <select class="form-control" id= "slc_jenis_pendisiplinan" name ="slc_jenis_pendisiplinan">     
                                    <option value="">Pilih jenis pendisiplinan</option> 
                                    <option value="jp2">Jenis pendisiplinan 1</option>
                                    <option value="jp2">Jenis pendisiplinan 2</option>            
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Pendisiplinan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="4" id="txt_ket_pendisplinan" name="txt_ket_pendisplinan"></textarea> 
                            </div>
                        </div>                     
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-submit-transaksi-pelanggaran" value=''>Save</button>  
            </div>
        </div>
    </div>
</div>

