@extends('layouts.layout')
@section('content')
 <!-- BEGIN PAGE BAR -->
 <div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>User</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
 <!-- BEGIN PAGE TITLE-->
 <h3 class="page-title"> Detail Data Master Siswa</h3>
<div class="profile">
    <div class="tabbable-line tabbable-full-width">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1_1" data-toggle="tab"> Detail </a>
            </li>
            <li style="display:none">
                <a href="#tab_1_3" data-toggle="tab"> Update </a>
            </li>       
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled profile-nav">
                            <li>
                                <!--<img src="../assets/pages/media/profile/people19.png" class="img-responsive pic-bordered" alt="" />-->
                                <img src="{{URL::asset('/assets/backend/pages/media/profile/people19.png')}}" class="img-responsive pic-bordered" alt=""/>                                             
                            </li>                        
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8 profile-info">
                                <h1 class="font-green sbold uppercase">{{$datas->nama}}</h1>                                      
                            </div>                                                                                     
                        </div>
                        <div class="tabbable-line tabbable-custom-profile">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_11" data-toggle="tab"> Siswa </a>
                                </li>
                                <li>
                                    <a href="#tab_1_22" data-toggle="tab"> Walimurid </a>
                                </li>
                            </ul>    
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_11">
                                    <div class="portlet-body">                                     
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead style="display:none">
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> Company </th>
                                                    <th class="hidden-xs">
                                                        <i class="fa fa-question"></i> Descrition </th>
                                                    <th>
                                                        <i class="fa fa-bookmark"></i> Amount </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <tr>
                                                    <td>
                                                        Tgl Lahir 
                                                    </td>
                                                    <td> 
                                                            
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td>
                                                        Alamat 
                                                    </td>
                                                    <td class="hidden-xs"> 
                                                        {{$datas->alamat}} 
                                                    </td>
                                                </tr>   
                                                <tr>
                                                    <td>
                                                        Jenis Kelamin 
                                                    </td>
                                                    <td class="hidden-xs"> 
                                                        {{$datas->jenis_kelamin}}   
                                                    </td>
                                                </tr> 
                                                <tr>
                                                    <td>
                                                        Hobi 
                                                    </td>
                                                    <td class="hidden-xs"> 
                                                        {{$datas->hobi}} 
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td>
                                                        No telp 
                                                    </td>
                                                    <td class="hidden-xs"> 
                                                        {{$datas->no_telp}} 
                                                    </td>
                                                </tr>      
                                                <tr>
                                                    <td>
                                                        Email 
                                                    </td>
                                                    <td class="hidden-xs"> 
                                                        {{$datas->email}} 
                                                    </td>
                                                </tr>                                                                                                                         
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                                <div class="tab-pane" id="tab_1_22">
                                    <div class="portlet-body"> 
                                        @if(!$datas->mstr_walimurid->isEmpty())
                                            @foreach ($datas->mstr_walimurid as $mstr_walimurid)                                              
                                                <table class="table table-striped table-bordered table-advance table-hover">                                  
                                                        <tbody>                                                
                                                            <tr>
                                                                <td>
                                                                    Nama 
                                                                </td>
                                                                <td> 
                                                                    {{ $mstr_walimurid->nama}}   
                                                                </td>
                                                            </tr>  
                                                            <tr>
                                                                <td>
                                                                    Jenis Kelamin 
                                                                </td>
                                                                <td class="hidden-xs">   
                                                                    {{ $mstr_walimurid->jenis_kelamin}}                                                    
                                                                </td>
                                                            </tr>   
                                                            <tr>
                                                                <td>
                                                                    Hubungan Keluarga 
                                                                </td>
                                                                <td class="hidden-xs">   
                                                                    {{ $mstr_walimurid->hub_keluarga}}                                                            
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td>
                                                                    Pekerjaan 
                                                                </td>
                                                                <td class="hidden-xs">  
                                                                    {{ $mstr_walimurid->pekerjaan}}                                                        
                                                                </td>
                                                            </tr>  
                                                            <tr>
                                                                <td>
                                                                    No telp 
                                                                </td>
                                                                <td class="hidden-xs">    
                                                                    {{ $mstr_walimurid->no_telp}}                                                               
                                                                </td>
                                                            </tr>      
                                                            <tr>
                                                                <td>
                                                                    Email 
                                                                </td>
                                                                <td class="hidden-xs">          
                                                                    {{ $mstr_walimurid->email}}                                               
                                                                </td>
                                                            </tr>                                                                                                                         
                                                        </tbody>
                                                    </table>
                                            @endforeach
                                        @else    
                                            <table class="table table-striped table-bordered table-advance table-hover">                                  
                                                <tbody>                                                
                                                    <tr>
                                                        <td>
                                                            Nama 
                                                        </td>
                                                        <td> 
                                                                
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td>
                                                            Jenis Kelamin 
                                                        </td>
                                                        <td class="hidden-xs">                                                      
                                                        </td>
                                                    </tr>   
                                                    <tr>
                                                        <td>
                                                            Hubungan Keluarga 
                                                        </td>
                                                        <td class="hidden-xs">                                                             
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>
                                                            Pekerjaan 
                                                        </td>
                                                        <td class="hidden-xs">                                                          
                                                        </td>
                                                    </tr>  
                                                    <tr>
                                                        <td>
                                                            No telp 
                                                        </td>
                                                        <td class="hidden-xs">                                                            
                                                        </td>
                                                    </tr>      
                                                    <tr>
                                                        <td>
                                                            Email 
                                                        </td>
                                                        <td class="hidden-xs">                                                         
                                                        </td>
                                                    </tr>                                                                                                                         
                                                </tbody>
                                            </table> 
                                        @endif                                                                                                              
                                    </div>
                                </div>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </div>
            <!--tab_1_2-->
            <div class="tab-pane" id="tab_1_3" style="display:none">
                <div class="row profile-account">
                    <div class="col-md-3">
                        <ul class="ver-inline-menu tabbable margin-bottom-10">
                            <li class="active">
                                <a data-toggle="tab" href="#tab_1-1">
                                    <i class="fa fa-cog"></i>Data siswa</a>
                                <span class="after"> </span>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_1-2">
                                    <i class="fa fa-cog"></i>Data Walimurid</a>
                                <span class="after"> </span>                                                                 
                            </li>
                            <li style="display:none">
                                <a data-toggle="tab" href="#tab_2-2">
                                    <i class="fa fa-picture-o"></i> Change Avatar </a>
                            </li>                        
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div id="tab_1-1" class="tab-pane active">
                                <form role="form" action="#">                                   
                                    <div class="form-group">
                                        <label class="control-label">NIS</label>
                                        <input type="text" class="form-control" id="txt_sis_updt_nis" name="txt_sis_updt_nis"  value="{{$datas->id}}" readonly/> 
                                    </div>
                                   <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" class="form-control" id="txt_sis_updt_nama" name="txt_sis_updt_nama" value="{{$datas->nama}}"/>
                                     </div>
                                    <div class="form-group">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select class="form-control" name="txt_sis_updt_jenis_kelamin" id="txt_sis_updt_jenis_kelamin">
                                            <option>Pria</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>                               
                                    <div class="form-group">
                                        <label class="control-label">Foto</label>
                                        <input type="text"  class="form-control" id="txt_sis_updt_foto" name="txt_sis_updt_foto" value="{{$datas->path_foto}}"/> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <textarea class="form-control" rows="3" id="txt_sis_updt_alamat" name="txt_sis_updt_alamat" value="">{{$datas->alamat}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">No Telp</label>
                                        <input type="text"  class="form-control" id="txt_sis_updt_no_telp" name="txt_sis_updt_no_telp" value="{{$datas->no_telp}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text"  class="form-control" id="txt_sis_updt_email" name="txt_sis_updt_email" value="{{$datas->email}}"/> 
                                    </div>
                                    <div class="margiv-top-10">
                                        <a href="javascript:;" class="btn green" id="" name=""> Save Changes </a>
                                        <a href="javascript:;" class="btn default" id="" name=""> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_1-2" class="tab-pane">
                                <label class="control-label">Pilih data walimurid akan di perbarui</label>
                                <select class="form-control" name="list_walimurid" id="list_walimurid">
                                    @foreach ($datas->mstr_walimurid as $mstr_walimurid)    
                                        <option value="{{$mstr_walimurid->id}}">{{$mstr_walimurid->nama}}</option>
                                    @endforeach
                                </select>
                                <form role="form" action="#">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" class="form-control" id="txt_wal_updt_nama" name="txt_wal_updt_nama"/> </div>
                                    <div class="form-group">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="txt_wal_updt_jenis_kelamin" name="txt_wal_updt_jenis_kelamin"/> </div>
                                    <div class="form-group">
                                        <label class="control-label">Hubungan Keluarga</label>
                                        <input type="text"  class="form-control" id="txt_wal_updt_hub_keluarga" name="txt_wal_updt_hub_keluarga"/> </div>
                                    <div class="form-group">
                                        <label class="control-label">Pekerjaan</label>
                                        <textarea class="form-control" rows="3" id="txt_wal_updt_pekerjaan" name="txt_wal_updt_pekerjaan"></textarea></div>
                                    <div class="form-group">
                                        <label class="control-label">No Telp</label>
                                        <input type="text"  class="form-control" id="txt_wal_updt_no_telp" name="txt_wal_updt_no_telp"/> </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="text"  class="form-control" id="txt_wal_updt_email" name="txt_wal_updt_email"/> </div>
                                    <div class="margiv-top-10">
                                        <a href="javascript:;" class="btn green" id="" name=""> Save Changes </a>
                                        <a href="javascript:;" class="btn default" id="" name=""> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <div id="tab_2-2" class="tab-pane">
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    </p>
                                <form action="#" role="form">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="..."> </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger"> NOTE! </span>
                                            <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                        </div>
                                    </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Submit </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>                          
                        </div>
                    </div>
                    <!--end col-md-9-->
                </div>
            </div>
            <!--end tab-pane-->
        </div>
    </div>
</div>
@endsection