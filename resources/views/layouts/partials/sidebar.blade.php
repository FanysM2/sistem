      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="	fas fa-tshirt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Sis <sup>Teñido</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item {{ Request::routeIs('User.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Crud</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Área Teñido
        </div>

        <!-- Nav Items -->


        <li class="nav-item {{ Request::routeIs('Muestra.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('muestra.index')}}">
                <i class="fas fa-book-open"></i>
                <span>Tipos de Tela</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('Marca.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('marca.index')}}">
                <i class="fas fa-bold"></i>
                <span>Marcas</span>
            </a>
        </li>


        <li class="nav-item {{ Request::routeIs('Aparato.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('aparato.index')}}">
                <i class="fa-solid fa-pen-fancy"></i>
                <span>Maquinas</span>
            </a>
        </li>
        

        <li class="nav-item {{ Request::routeIs('Menu.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('menu.index')}}">
                <i class="fas fa-file-alt"></i>
                <span>Pasos para fabricar Tela</span>
            </a>
        </li>

            <li class="nav-item {{ Request::routeIs('Encuesta.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('encuesta.index')}}">
                    <i class="fas fa-file-alt"></i>
                    <span>Encuestas</span>
                </a>
            </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Archivero
                </div>

                <!-- Nav Items -->
        <li class="nav-item {{ Request::routeIs('Archivos.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('archivos.index')}}">
                <i class="fas fa-folder-open"></i>
                <span>Folders</span>
            </a>
        </li>
      

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
