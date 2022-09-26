 <div class="page-wrap">
<div class="app-sidebar colored">
<div class="sidebar-header">
<a class="header-brand" href="index.html">
    <div class="logo-img">
        {{-- <img src="{{ asset('template/src/img/brand-white.svg') }}" class="header-brand-img" alt="lavalite">  --}}

         <img src="{{ asset('template/img/users/microscope.png') }}" class="rounded-circle img-fluid" alt="" width="35">
    </div>
    <span class="text">MedicalPoint</span>
</a>
<button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
<button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
</div>

<div class="sidebar-content">
<div class="nav-container">
    <nav id="main-menu-navigation" class="navigation-main ">
        {{-- <div class="nav-lavel">Navigation</div> --}}
        <div class="nav-item active">
            <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span class="fancyfont1">Dashboard</span></a>
        </div>
        {{-- <div class="nav-item">
            <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
        </div> --}}

         @if(auth()->check()&& auth()->user()->role->name === 'admin')

        <div class="nav-item has-sub ">
            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span class="fancyfont1">Admin</span> <span class="badge badge-danger">150+</span></a>
            <div class="submenu-content">
                <a href="{{ route('doctor.index') }}" class="menu-item">View user</a>
                <a href="{{ route('doctor.create') }}" class="menu-item">Create  user</a>
                
            </div>
        </div>

        @endif

             @if(auth()->check()&& auth()->user()->role->name === 'doctor')

         <div class="nav-item has-sub">
            <a href="javascript:void(0)"><i class="ik ik-calendar"></i><span class="fancyfont1">Doctor</span> <span class="badge badge-danger">45+</span></a>
            <div class="submenu-content">
                <a href="{{ route('appointment.create') }}" class="menu-item">Create appointment</a>
                <a href="{{ route('appointment.index') }}" class="menu-item">View appointment</a>
                
            </div>
        </div>  

        @endif

           @if(auth()->check()&& auth()->user()->role->name === 'admin')

        <div class="nav-item has-sub">
            <a href="javascript:void(0)"><i class="ik ik-calendar"></i><span class="fancyfont1">Patient</span> <span class="badge badge-danger">45+</span></a>
            <div class="submenu-content">
                <a href="{{ route('patient') }}" class="menu-item">Today appointment</a>
                <a href="{{ route('all.appointments') }}" class="menu-item">Total appointments</a>
                
            </div>
        </div>  

        @endif
       
    </nav>
</div>
</div>
</div>

<style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}

 .fancyfont{
        font-family: 'Roboto', sans-serif;
    }

    .fancyfont1{
        font-family: 'Roboto', sans-serif;
        font-size: 17px !important;
    }
</style>