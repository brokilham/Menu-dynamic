<div class="modal fade" id="modal-add-mstr-siswa" name = "modal-add-mstr-siswa" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                         <!-- begin wizard form --> 
                         <div class="portlet light bordered" id="form_wizard_1">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-red"></i>
                                    <span class="caption-subject font-red bold uppercase"> 
                                        <span class="step-title"> Langkah 1 dari 2 </span>
                                    </span>
                                </div>                           
                            </div>
                            <div class="portlet-body form">
                                <!--<form class="form-horizontal" action="#" id="submit_form" method="POST">-->
                                <form class="form-horizontal" action="#"  id = "frm-add-mstr-siswa" method="POST" enctype="multipart/form-data">                                                            
                                   <!-- {!! csrf_field() !!} -->
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step">
                                                        <span class="number"> 1 </span>
                                                        <span class="desc">
                                                            <i class="fa fa-check"></i> Data Siswa </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                        <span class="number"> 2 </span>
                                                        <span class="desc">
                                                            <i class="fa fa-check"></i> Data Walimurid </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" class="step">
                                                        <span class="number"> 3 </span>
                                                        <span class="desc">
                                                            <i class="fa fa-check"></i> Konfirmasi Data </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                <div class="progress-bar progress-bar-success"> </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="alert alert-danger display-none">
                                                    <button class="close" data-dismiss="alert"></button> Upps, sepertinya masih ada informasi yang belum kamu masukkan !! </div>
                                                <div class="alert alert-success display-none">
                                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                <div class="tab-pane active" id="tab1">               
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">NIS
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_sis_nis" id="txt_sis_nis"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nama
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_sis_nama" id="txt_sis_nama" />
                                                            <!-- <input type="password" class="form-control" name="password" id="submit_form_password" />-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Jenis Kelamin
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <!--<input type="text" class="form-control" name="email" />-->
                                                            <select class="form-control" name="txt_sis_jenis_kelamin" id="txt_sis_jenis_kelamin">
                                                                <option value = "">Pilih Jenis Kelamin</option>
                                                                <option value = "pria">Pria</option>
                                                                <option value = "perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Foto
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="file" class="form-control" name="txt_sis_path_foto" id="txt_sis_path_foto" accept="image/Jpeg" />           
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Alamat
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <!--<input type="password" class="form-control" name="rpassword" />-->
                                                            <!--<textarea class="form-control autosizeme" rows="4" placeholder="Autosizeme..." data-autosize-on="true" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 90px; margin-left: 0px; margin-right: 76.25px; width: 658px;"></textarea>-->
                                                            <textarea class="form-control autosizeme" rows="4" 
                                                             data-autosize-on="true" name="txt_sis_alamat" id="txt_sis_alamat"></textarea>                                                           
                                                        </div>
                                                    </div>        
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">No Telpon
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_sis_no_telp" id="txt_sis_no_telp" />                                     
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_sis_email" id="txt_sis_email" />                                     
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Hobi
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_sis_hobi" id="txt_sis_hobi" />                                     
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nama
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_wal_nama" id="txt_wal_nama" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Jenis Kelamin
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="txt_wal_jenis_kelamin" id="txt_wal_jenis_kelamin">
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="pria">Pria</option>
                                                                <option value="perempuan">Perempuan</option>
                                                            </select>        
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Hubungan keluarga
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="txt_wal_family" id="txt_wal_family">
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
                                                        <label class="control-label col-md-3">Pekerjaan
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_wal_pekerjaan" id="txt_wal_pekerjaan" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">No telpon
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_wal_no_telp" id="txt_wal_no_telp" />
                                                         </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_Wal_email" id="txt_wal_email" />
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="block">KOnfirmasi data yang akan disimpan</h3>
                                                        <h4 class="form-section">Data Siswa</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">NIS:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_nis"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nama:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_nama"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jenis Kelamin:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_jenis_kelamin"> </p>
                                                            </div>
                                                        </div>       
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Alamat:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_alamat"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">No telpon:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_no_telp"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_email"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Hobi:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_sis_hobi"> </p>
                                                            </div>
                                                        </div>
                                                        <h4 class="form-section">Data Walimurid</h4>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nama:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_wal_nama"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jenis Kelamin:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_wal_jenis_kelamin"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Hubungan keluarga:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_wal_family"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Pekerjaan:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_wal_pekerjaan"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">No telpon:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_wal_no_telp"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email:</label>
                                                            <div class="col-md-4">
                                                                <p class="form-control-static" data-display="txt_Wal_email"> </p>
                                                            </div>
                                                        </div>                                                
                                                </div>                                             
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn default button-previous">
                                                        <i class="fa fa-angle-left"></i> Back </a>
                                                    <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <a class="btn green button-submit" id= "btn-submit-mstr-siswa"> Submit
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                         <!-- end wizard form -->    
                    </div>
                </div>                  
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

