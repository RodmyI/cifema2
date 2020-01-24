  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4 text-center">
      <img src="{{ asset('images/logo_cifema.jpg') }}" 
           alt="CIFEMA SAM"
           class="brand-image elevation-3"
           style="opacity: .8">
      <!--<span class="brand-text font-weight-light">CIFEMA</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('home') }}" class="nav-link @php if(session('page')=='home'){ echo 'active'; } @endphp">
              <i class="fas fa-home"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @can('users.index')
          <li class="nav-item @php if(session('page')=='users'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='users'){ echo 'active'; } @endphp">
              <i class="fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link @php if(session('page_item')=='users_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Usuarios</p>
                </a>
              </li>
              @can('users.create')
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link @php if(session('page_item')=='users_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir Nuevo</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('roles.index')
          <li class="nav-item @php if(session('page')=='roles'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='roles'){ echo 'active'; } @endphp">
              <i class="fas fa-address-book"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link @php if(session('page_item')=='roles_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Roles</p>
                </a>
              </li>
              @can('roles.create')
              <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link @php if(session('page_item')=='roles_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir Rol</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('products.index')
          <li class="nav-item @php if(session('page')=='products'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='products'){ echo 'active'; } @endphp">
              <i class="fas fa-tractor"></i>
              <p>
                Productos Terminados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link @php if(session('page_item')=='products_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Productos</p>
                </a>
              </li>
              @can('products.create')
              <li class="nav-item">
                <a href="{{ route('products.create') }}" class="nav-link @php if(session('page_item')=='products_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir Producto</p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                <a href="{{ route('typepts.index') }}" class="nav-link @php if(session('page_item')=='products_cat'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Categorias</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('materials.index')
          <li class="nav-item @php if(session('page')=='materials'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='materials'){ echo 'active'; } @endphp">
              <i class="fas fa-tools"></i>
              <p>
                Materiales
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('materials.index') }}" class="nav-link @php if(session('page_item')=='materials_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Materiales</p>
                </a>
              </li>
              @can('materials.create')
              <li class="nav-item">
                <a href="{{ route('materials.create') }}" class="nav-link @php if(session('page_item')=='materials_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir Material</p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                <a href="{{ route('typemats.index') }}" class="nav-link @php if(session('page_item')=='materials_cat'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Categorias</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('orderps.index')
          <li class="nav-item @php if(session('page')=='orderps'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='orderps'){ echo 'active'; } @endphp">
              <i class="fas fa-file-alt"></i>
              <p>
                Ordenes de Producción
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('orderps.index') }}" class="nav-link @php if(session('page_item')=='orderps_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar O.P.</p>
                </a>
              </li>
              @can('orderps.create')
              <li class="nav-item">
                <a href="{{ route('orderps.create') }}" class="nav-link @php if(session('page_item')=='orderps_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Añadir O.P.</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('standards.index')
          <li class="nav-item @php if(session('page')=='standards'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='standards'){ echo 'active'; } @endphp">
              <i class="fas fa-file-alt"></i>
              <p>
                Estandares
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('standards.index') }}" class="nav-link @php if(session('page_item')=='standards_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Std. O.P.</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('buyorder_material.index')
          <li class="nav-item @php if(session('page')=='buyorder_material'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='buyorder_material'){ echo 'active'; } @endphp">
              <i class="fas fa-file-alt"></i>
              <p>
                Ordenes de Compra
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('buyorder_material.index') }}" class="nav-link @php if(session('page_item')=='buyorder_material_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar O.C.</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @can('entrymps.index')
          <li class="nav-item @php if(session('page')=='entrymps'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='entrymps'){ echo 'active'; } @endphp">
              <i class="fas fa-tasks"></i>
              <p>
                Ingreso de Material
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('entrymps.index') }}" class="nav-link @php if(session('page_item')=='entrymps_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Ingresos</p>
                </a>
              </li>
              @can('entrymps.create')
              <li class="nav-item">
                <a href="{{ route('entrymps.create') }}" class="nav-link @php if(session('page_item')=='entrymps_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Ingreso</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('outputmps.index')
          <li class="nav-item @php if(session('page')=='outputmps'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='outputmps'){ echo 'active'; } @endphp">
              <i class="fas fa-tasks"></i>
              <p>
                Salida de Material O.P.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('outputmps.index') }}" class="nav-link @php if(session('page_item')=='outputmps_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Salidas</p>
                </a>
              </li>
              @can('outputmps.create')
              <li class="nav-item">
                <a href="{{ route('outputmps.create') }}" class="nav-link @php if(session('page_item')=='entrymps_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Salidad</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
          @can('devolutionmps.index')
          <li class="nav-item @php if(session('page')=='devolutionmps'){ echo 'menu-open'; } @endphp">
            <a href="#" class="nav-link @php if(session('page')=='devolutionmps'){ echo 'active'; } @endphp">
              <i class="fas fa-tasks"></i>
              <p>
                Devolución de Material O.P.
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('devolutionmps.index') }}" class="nav-link @php if(session('page_item')=='devolutionmps_index'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Devoluciones</p>
                </a>
              </li>
              @can('devolutionmps.create')
              <li class="nav-item">
                <a href="{{ route('devolutionmps.create') }}" class="nav-link @php if(session('page_item')=='entrymps_create'){ echo 'active'; } @endphp">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Devolución</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>