<div class="modal fade modal-scroll" id="modal-update-mstr-siswa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Edit data siswa</h4>
            </div>
            <div class="modal-body">
                <form id = "frm-update-mstr-siswa" class="form-horizontal" role="form" method="POST">
                    <div class="form-body">
                        <div class = "row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab"> Siswa </a>                                      
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab"> Walimurid </a>
                                    </li>                                  
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab_1_1">
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">NIS</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_sis_updt_nis" name="txt_sis_updt_nis" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Nama</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_sis_updt_nama" name="txt_sis_updt_nama" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Jenis Kelamin</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="txt_sis_updt_jenis_kelamin" id="txt_sis_updt_jenis_kelamin">
                                                            <option value = "">Pilih Jenis Kelamin</option>
                                                            <option value = "pria">Pria</option>
                                                            <option value = "perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <label class="col-md-3 control-label">Foto</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_sis_updt_foto" name="txt_sis_updt_foto" value="-">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Alamat</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_sis_updt_alamat" name="txt_sis_updt_alamat" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">No telpon</label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control"  id="txt_sis_updt_no_telp" name="txt_sis_updt_no_telp" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control"  id="txt_sis_updt_email" name="txt_sis_updt_email" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Hobi</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_sis_updt_hobi" name="txt_sis_updt_hobi" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_1_2">
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Id Walimurid</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_walimurid_updt_id" name="txt_walimurid_updt_id" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Nama</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_walimurid_updt_nama" name="txt_walimurid_updt_nama" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Jenis Kelamin</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="txt_walimurid_updt_jenis_kelamin" id="txt_walimurid_updt_jenis_kelamin">
                                                            <option value = "">Pilih Jenis Kelamin</option>
                                                            <option value = "pria">Pria</option>
                                                            <option value = "perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Hubungan keluarga </label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="txt_walimurid_updt_hub_keluarga" id="txt_walimurid_updt_hub_keluarga">
                                                            <option value="">Pilih Hubungan Keluarga</option>
                                                            <option value="ayah">Ayah</option>
                                                            <option value="ibu">Ibu</option>
                                                            <option value="kakak">Kakak</option>
                                                            <option value="kakek">Kakek</option>
                                                            <option value="nenek">Nenek</option>
                                                            <option value="paman">Paman</option>
                                                            <option value="tante">Tante</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Pekerjaan</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_walimurid_updt_pekerjaan" name="txt_walimurid_updt_pekerjaan" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Alamat</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"  id="txt_walimurid_updt_alamat" name="txt_walimurid_updt_alamat" >
                                                    </div>
                                                    </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">No telpon</label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control"  id="txt_walimurid_updt_no_telp" name="txt_walimurid_updt_no_telp" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control"  id="txt_walimurid_updt_email" name="txt_walimurid_updt_email" >
                                                    </div>
                                                </div>                       
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>                         
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-update-mstr-siswa">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- desain modal yang lama
    <div class="modal fade" id="modal-update" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-body"> 
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">update Master Privilages</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form id = "frm-update-mstr-privilages" class="form-horizontal" role="form" method="POST">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control"  id="txt_name_updt" name="txt_name_updt" >
                                    </div>
                                </div>
                                <div class="form-group" style="display:none">
                                    <label class="col-md-3 control-label">Id</label>
                                    <div class="col-md-7">
                                        <input type="text"  id = "txt_status_id_updt" name="txt_status_id_updt" >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                                                                   
                </div>                                                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" id="btn-update-mstr-privilages">Save</button>
            </div>
        </div>
    </div>
</div>
-->