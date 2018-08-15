@extends('layouts.layout')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Bimbingan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Pengajuan Bimbingan</span>
        </li>
    </ul>
</div>
   <div class="row"> 
    <div class=" page-title">                  
    </div> 
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Daftar pengajuan bimbingan</span>
                </div>              
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group" style="display:">
                                <button id="" class="btn sbold green" data-toggle="modal"> Panggil Siswa
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button  style="display:" class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-print"></i> Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                    </li>
                                    <li>
                                        <a id ="btn_pengajuan_excel">
                                        <i class="fa fa-file-excel-o" ></i> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <div class="col-md-9">                        
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="optionsRencanaBimbingan" id="optionsAll" value="" checked> All
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="optionsRencanaBimbingan" id="optionBlmDirespon" value="0" > Belum di respon
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="optionsRencanaBimbingan" id="optionDisetujui" value="1" > Disetujui
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="optionsRencanaBimbingan" id="optionsDitolak" value="2" > Ditolak
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>            
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dt_transaksi_pengajuan_bimbingan">
                    <thead>
                        <tr>             
                            <th>Id</th>
                            <th>Id siswa</th>
                            <th>Id jadwal</th>
                            <th>Topik</th> 
                            <th>Action</th>             
                        </tr>
                    </thead>
                    <tbody>                                                                                                                             
                   </tbody>
                </table>
            </div>              
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>  
@endsection
@include('backend.webpages_transaksi_bimbingan.transaksi_bimbingan_pengajuan.modal-tolak-pengajuan') 
