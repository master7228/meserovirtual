<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URL;?>/App/app">
    
    <div class="sidebar-brand-icon"><img src="<?php echo URL.VIEWS.DTF; ?>/img/logo-menu.png" style="width:30%"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Configuración</span></a>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
        aria-expanded="true" aria-controls="collapseAdmin">
        <i class="fas fa-fw fa-cog"></i>
        <span>Administración</span>
    </a>
    <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo URL;?>Sede/list">Sedes</a>
            <a class="collapse-item" href="<?php echo URL;?>Mesa/list">Mesas</a>
            <a class="collapse-item" href="<?php echo URL;?>Productos/list">Productos</a>
            <a class="collapse-item" href="<?php echo URL;?>AFP/list">Cartas</a>
            
            
        </div>
    </div>
</li> 



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>