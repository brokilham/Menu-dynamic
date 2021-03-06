
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
         <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                 <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li> 
            <!-- <li class="nav-item start active open">-->
            <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i> 
                    <span class="title">Dashboard</span>
                    <!--
                    <span class="selected"></span>
                    <span class="arrow open"></span>-->
                </a>
            </li>    
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            @foreach ($datas['Webpages'] as $Webpage)
                 <li class="nav-item">
                    <a href="{{ AppHelper::parseDomain($Webpage->route)}}" class="nav-link nav-toggle">
                        <i class="{{ $Webpage->icon}}"></i>
                        <span class="title">{{ $Webpage->nama}}</span>                       
                        <span class="selected"></span>                  
                    </a>
                    @if(!$Webpage->mainmenu ->isEmpty())
                    <ul class="sub-menu">
                        @foreach ($Webpage->mainmenu as $mainmenu)
                        <li class="nav-item  ">
                            <a href="{{ AppHelper::parseDomain($mainmenu->route)}}" class="nav-link ">
                                <span class="title">{{ $mainmenu->nama}}</span>
                            </a>
                        </li>
                        @endforeach      
                    </ul>
                    @endif
                </li>                     
            @endforeach                
        </ul>    
    </div>  
</div>