@extends('layouts.layout')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Master Data</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Master Jabatan</span>
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
                    <span class="caption-subject bold uppercase"> Master Jabatan</span>
                </div>              
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group" >
                                <!-- button add sengaja di disabled karena sekarang masih menghandel hanya jabatan
                                guru bk dan wwalikelas -->
                                <button id="call-modal-add-mstr-jabatan" class="btn sbold green" data-toggle="modal" disabled> Add New
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right" style="display:none">
                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
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
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dt_master_jabatan">
                    <thead>
                        <tr>                           
                            <th style = " text-align: center;">Id</th>
                            <th style = " text-align: center;">Nama Jabatan</th>
                            <th style = " text-align: center;">Login AS</th>
                            <th style = " text-align: center;">Created Date</th>
                            <th style = " text-align: center;">Updated Date</th>                            
                            <th style = " text-align: center;">Created By</th>  
                            <th style = " text-align: center;">Status</th>  
                            <th style = " text-align: center;">Actions</th>
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
@include('backend.webpages_master_data.master_jabatan.modal-add') 
@include('backend.webpages_master_data.master_jabatan.modal-update') 
@endsection

