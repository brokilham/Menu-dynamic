<div class="modal fade" id="modal-add" name = "modal-add" tabindex="-1" role="basic" aria-hidden="true">
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
                                <form class="form-horizontal" action="#"  id = "frm-add-mstr-siswa" method="POST">                                                 
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
                                                            <input type="number" class="form-control" name="txt_sis_nis" id="txt_sis_nis"/>
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
                                                                <option>Pria</option>
                                                                <option>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Foto
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="txt_sis_path_foto" id="txt_sis_path_foto" />           
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
                                                            <input type="email" class="form-control" name="txt_sis_email" id="txt_sis_email" />                                     
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
                                                                <option value="Pria">Pria</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>        
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Hubungan keluarga
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="txt_wal_family" id="txt_wal_family">
                                                                <option value="Ayah">Ayah</option>
                                                                <option value="Ibu">Ibu</option>
                                                                <option value="Kakak">Kakak</option>
                                                                <option value="Kakek">Kakek</option>
                                                                <option value="Nenek">Nenek</option>
                                                                <option value="Paman">Paman</option>
                                                                <option value="Tante">Tante</option>
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
                                                            <input type="number" class="form-control" name="txt_wal_no_telp" id="txt_wal_no_telp" />
                                                         </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" name="txt_Wal_email" id="txt_wal_email" />
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

