@extends('layouts.layout')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Dashbord</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<h3 class="page-title"> Dashboard
    <small>sistem manajemen bimbingan konseling</small>
</h3>
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{$datas['bimbingan'][0]->Realisasi_bimbingan_all_this_month}}">0</span>
                </div>
                <div class="desc"><h5>Konsultasi terlaksana bulan ini</h5> </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{$datas['bimbingan'][0]->Realisasi_bimbingan_all_this_week}}">0</span></div>
                <div class="desc"> <h5>Konsultasi terlaksana minggu ini</h5> </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red " href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{$datas['pelanggaran'][0]->Pelangaran_all_this_month}}">0</span>
                </div>
                <div class="desc"><h5> Pelanggaran bulan ini</h5></div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> 
                    <span data-counter="counterup" data-value="{{$datas['pelanggaran'][0]->Pelanggaran_all_this_week}}">0</span></div>
                <div class="desc"><h5> Pelanggaran bulan ini </h5></div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
<div class="row">
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Grafik konsultasi</span>
                    <span class="caption-helper" style="display:none">weekly stats...</span>
                </div>
                <div class="actions" style="display:none">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn red btn-outline btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">New</label>
                        <label class="btn red btn-outline btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_statistics_loading">
                    <img src="../assets/backend/global/img/loading.gif" alt="loading" /> </div>
                <div id="site_statistics_content" class="display-none">
                    <div id="site_statistics" class="chart"> </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Grafik pelanggaran</span>
                    <span class="caption-helper" style="display:none">monthly stats...</span>
                </div>
                <div class="actions" style="display:none">
                    <div class="btn-group">
                        <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                            <span class="fa fa-angle-down"> </span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;"> Q1 2014
                                    <span class="label label-sm label-default"> past </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Q2 2014
                                    <span class="label label-sm label-default"> past </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="javascript:;"> Q3 2014
                                    <span class="label label-sm label-success"> current </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Q4 2014
                                    <span class="label label-sm label-warning"> upcoming </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading">
                    <img src="../assets/backend/global/img/loading.gif" alt="loading" /> </div>
                <div id="site_activities_content" class="display-none">
                    <div id="site_activities" class="chart" > </div>
                </div>
                <!--
                <div style="margin: 20px 0 10px 30px" >
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-success"> Revenue: </span>
                            <h3>$13,234</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-info"> Tax: </span>
                            <h3>$134,900</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-danger"> Shipment: </span>
                            <h3>$1,134</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-warning"> Orders: </span>
                            <h3>235090</h3>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div> 
@endsection
