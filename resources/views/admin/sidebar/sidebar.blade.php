<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{url('admin-dashboard')}}" class="brand-link">
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
               <i class="nav-icon fas fa-sliders-h"></i>
                  <p>
                    Sliders
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/all-sliders')}}"  class="nav-link">
                     <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Sliders</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-rss"></i>
                  <p>
                     Blog
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('add-blog')}}"  class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Add Blog</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('all-blog')}}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>All Blog</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                     Service
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('add-service')}}"  class="nav-link">
                        <i class="far fa-newspaper nav-icon"></i>
                        <p>Add Service</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('all-service')}}" class="nav-link">
                        <i class="far fa-newspaper nav-icon"></i>
                        <p>All Service</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-star"></i>
                  <p>
                     Testimonial
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('add-testimonial')}}"  class="nav-link">
                        <i class="far fa-square nav-icon"></i>
                        <p>Add Testimonial</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('all-testimonial')}}" class="nav-link">
                        <i class="far fa-square nav-icon"></i>
                        <p>All Testimonial</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                     Employers
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('add-employers')}}"  class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Employers</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('all-employers')}}" class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Employers</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                     Teacher
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add-teacher')}}"  class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Teacher</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/all-teachers')}}" class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Teacher</p>
                     </a>
                  </li>
               </ul>
            </li>
			 <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                     Student
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/add-student')}}"  class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>Add Student</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{url('admin/all-students')}}" class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Student</p>
                     </a>
                  </li>
               </ul>
            </li>
			<li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-address-book"></i>
                  <p>
                   Contact
                     <i class="fas fa-angle-left right"></i>
                     <span class="badge badge-info right"></span>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{url('admin/all-contacts-list')}}" class="nav-link">
                        <i class="fas fa-arrow-right nav-icon"></i>
                        <p>All Contacts</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               <i class="nav-icon fas fa-sign-out-alt"></i>
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