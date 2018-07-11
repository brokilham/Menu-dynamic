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
            <span>History Bimbingan</span>
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
                    <span class="caption-subject bold uppercase">History bimbingan</span>
                </div>              
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group" style="display:none">
                                <button id="call-modal-add-transaksi-pelanggaran" class="btn sbold green" data-toggle="modal"> Add New
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button  style="display:none" class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
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
                                        <a href="javascript:;">
                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none">
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
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dt_history_bimbingan">
                    <thead>
                        <tr>             
                            <th style='vertical-align:middle; text-align:center;'>Id siswa</th>
                            <th style='vertical-align:middle; text-align:center;'>Nama</th>
                            <th style='vertical-align:middle; text-align:center;'>Kelas</th>
                            <th style='vertical-align:middle; text-align:center;'>Ruang</th> 
                            <th style='vertical-align:middle; text-align:center;'>Last Updated Data</th>        
                            <th style='vertical-align:middle; text-align:center;'>Detail</th>     
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

