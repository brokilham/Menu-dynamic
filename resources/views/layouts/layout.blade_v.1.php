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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/simple-line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />       
        <link href="{{URL::asset('/assets/backend/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{URL::asset('/assets/backend/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/backend/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery.min.js')}}" type="text/javascript"></script>       
        <script src="{{URL::asset('/assets/backend/global/scripts/app.js')}}" type="text/javascript"></script>
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

        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>       
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/pages/scripts/form-wizard.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
        <!--
        <script src="{{URL::asset('/assets/backend/siswa.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/kelas.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/walikelas.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/gurubk.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/RelBimbingan.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/KegBimbingan.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/RenBimbingan.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/Pelanggaran.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/Pengaturan.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/UserByApp.js')}}" type="text/javascript"></script> 
        -->
        <script src="{{URL::asset('/assets/backend/global/plugins/bootstrap-toastr/toastr.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>    
        <script src="{{URL::asset('/assets/backend/pages/scripts/components-select2.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/Pelanggaran-Auto.js')}}" type="text/javascript"></script>      
        <script src="{{URL::asset('/assets/backend/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('/assets/backend/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
    </body>
</html>