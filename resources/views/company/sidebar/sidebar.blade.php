<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{url('company/company-dashboard')}}" class="brand-link">
   <img src="{{ asset('public/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Admin</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->
      <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar">
               <i class="fas fa-search fa-fw"></i>
               </button>
            </div>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
               <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>
                     Company
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('company/add-new-company')}}"  class="nav-link">
                     <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Company</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('company/all-companies-list')}}" class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Company</p>
                     </a>
                  </li>
               </ul>
            </li>
					 <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="fas fa-users nav-icon"></i>
                  <p>
                     Employee
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('company/all-employees-list')}}"  class="nav-link">
                     <i class="fas fa-star nav-icon"></i>
                        <p>All Employee</p>
                     </a>
                  </li>
               </ul>
            </li>
				 <li class="nav-item">
               <a href="#" class="nav-link">
              <i class="fas fa-dumbbell nav-icon"></i>
                  <p>
                     Trainer
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('company/all-traineries-list')}}"  class="nav-link">
                     <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Traineries</p>
                     </a>
                  </li>
               </ul>
            </li>
			 <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="fas fa-box nav-icon"></i>
                  <p>
                     Product
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('company/all-products')}}"  class="nav-link">
                     <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Products</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               <i class="fas fa-sign-out-alt nav-icon"></i>
               {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>