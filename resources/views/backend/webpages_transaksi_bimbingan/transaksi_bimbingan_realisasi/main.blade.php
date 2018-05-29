@extends('layouts.layout')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Tables</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Datatables</span>
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
                    <span class="caption-subject bold uppercase"> Daftar realisasi bimbingan</span>
                </div>              
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
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
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dt_transaksi_realisasi_bimbingan">
                    <thead>
                        <tr>             
                            <th>Id</th>
                            <th>Id siswa</th>                               
                            <th>Jenis Pelanggaran</th>
                            <th>Ket Pelanggaran</th>
                            <th>Jenis Pendisiplinan</th>
                            <th>Ket Pendisiplinan</th>
                            <th>Tgl Kejadian</th>
                            <th>Lokasi Kejadian</th>                                                 
                            <th>Created By</th>  
                            <th>Created Date</th>
                            <th>Updated Date</th> 
                            <th>Status</th>  
                            <th>Actions</th>       
                            
                            <!--
                            <th>Id</th>
                            <th>Id siswa</th>
                            <th>Nama Siswa</th>                          
                            <th>Jenis Pelanggaran</th>
                            <th>Ket Pelanggaran</th>
                            <th>Jenis Pendisiplinan</th>
                            <th>Ket Pendisiplinan</th>
                            <th>Tgl Kejadian</th>
                            <th>Lokasi Kejadian</th>                                                 
                            <th>Created By</th>  
                            <th>Created Date</th>
                            <th>Updated Date</th> 
                            <th>Status</th>  
                            <th>Actions</th>   -->
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

