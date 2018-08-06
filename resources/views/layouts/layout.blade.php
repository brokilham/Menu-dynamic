<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SIMABK</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="_token" content="{!! csrf_token() !!}"/>
       
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{URL::asset('/assets/backend/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />  
        <link href="{{URL::asset('/assets/backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />   
        <link href="{{URL::asset('/assets/backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::asset('/assets/backend/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL::asset('/assets/backend/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::asset('/assets/backend/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
   
       

    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">       
        @include('layouts._header')
        <div class="clearfix"> </div>
        <div class="page-container">
            @include('layouts._side_navbar') 
            <div class="page-content-wrapper">
                <div class="page-content">
                  @yield('content')          
                </div>         
            </div>
        </div>
        @include('layouts._footer')

          <!-- BEGIN CORE PLUGINS -->
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!--<script src="{{URL::asset('/assets/backend/global/plugins/moment.min.js')}}" type="text/javascript"></script>-->
        <!--<script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>-->
        <script src="{{URL::asset('/assets/backend/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
       <!-- <script src="{{URL::asset('/assets/backend/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>-->
        <script src="{{URL::asset('/assets/backend/global/plugins/horizontal-timeline/horozontal-timeline.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-validation/js/jquery.validate.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/clockface/js/clockface.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{URL::asset('/assets/backend/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!--<script src="{{URL::asset('/assets/backend/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>-->
        <script src="{{URL::asset('/assets/backend/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
        <!--<script src="{{URL::asset('/assets/backend/pages/scripts/form-wizard.js')}}" type="text/javascript"></script>-->
        <script src="{{URL::asset('/assets/backend/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>  
        <script src="{{URL::asset('/assets/backend/pages/scripts/components-select2.js')}}" type="text/javascript"></script>              
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{URL::asset('/assets/backend/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- BEGIN PROCESS SCRIPT -->
        <script src="{{URL::asset('/assets/backend/js/form-wizard.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/js/dashboard.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/master_privilages.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/master_kelas.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/master_jabatan.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/js/master_guru.js')}}" type="text/javascript"></script>  
        <script src="{{URL::asset('/assets/backend/js/master_siswa.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/master_jadwal.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/distribusi_jabatan.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/distribusi_kelas.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/distribusi_walikelas.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/distribusi_jadwal.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/js/transaksi_pelanggaran.js')}}" type="text/javascript"></script> 
        <script src="{{URL::asset('/assets/backend/js/transaksi_bimbingan_pengajuan.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/js/transaksi_bimbingan_realisasi.js')}}" type="text/javascript"></script>  
        <script src="{{URL::asset('/assets/backend/js/transaksi_bimbingan_data_pendukung.js')}}" type="text/javascript"></script>      
        <script src="{{URL::asset('/assets/backend/js/global_function.js')}}" type="text/javascript"></script>    
        <!-- END PROCESS SCRIPT -->

 

    </body>
</html>