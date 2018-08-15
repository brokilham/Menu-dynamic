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
            <a href="#">History Bimbingan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Detail History Bimbingan</span>
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
                    <span class="caption-subject bold uppercase">Detail History bimbingan</span>
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
                </div>   
                <div class="row">
                    <div class="col-md-4">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" >                         
                        <tbody> 
                            <tr>
                                <th>Id Siswa</th>             
                                <th>  {{$datas['mstr_siswa']->id}} </th>                    
                            </tr>
                            <tr>                                  
                                <th>Nama</th>
                                <th> {{$datas['mstr_siswa']->nama}}</th>                           
                            </tr>
                            <tr>                         
                                <th>Kelas</th>
                                <th>{{$datas['mstr_siswa']->t_distribusi_kelas->mstr_kelas->kelas}}</th>
                            </tr>
                                <tr>                          
                                        <th>Ruang</th>
                                <th>{{$datas['mstr_siswa']->t_distribusi_kelas->mstr_kelas->ruang}}</th>
                            </tr>                                                                                                                            
                        </tbody>
                    </table>
                    </div>
                </div>   
              
                <div class="row">
                    <div class="col-md-12">                          
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="dt_detail_history_bimbingan" >
                            <thead>                           
                                <tr>             
                                    <th style='vertical-align:middle; text-align:center;'>Tgl Pengajuan</th>
                                    <th style='vertical-align:middle; text-align:center;'>Tgl Realisasi</th> 
                                    <th style='vertical-align:middle; text-align:center;'>Status Realisasi</th>
                                    <th style='vertical-align:middle; text-align:center;'>Guru BK</th>
                                    <th style='vertical-align:middle; text-align:center;'>Topik bimbingan</th>
                                    <!--<!<th style='vertical-align:middle; text-align:center;'>Respon</th> -->                        
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($datas['t_bimbingan'] as $t_bimbingan)
                                    <tr> 
                                        <td style='vertical-align:middle; text-align:center;'>{{$t_bimbingan->tgl_pengajuan}}</td> 
                                        <td style='vertical-align:middle; text-align:center;'>{{$t_bimbingan->tgl_realisasi}} </td>
                                        <td style='vertical-align:middle; text-align:center;'>{{$t_bimbingan->mstr_ket_realisasi->keterangan}} </td>
                                        <td style='vertical-align:middle; text-align:center;'>{{$t_bimbingan->mstr_guru->nama}} </td>
                                        <td>{{$t_bimbingan->topik_bimbingan}} </td>                              
                                    </tr>                            
                                @endforeach                                                                                                                     
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>              
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>  
@endsection

