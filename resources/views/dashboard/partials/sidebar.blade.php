<!-- Brand Logo -->
<a href="/" class="brand-link">
   <img src="/img/logo-frpb.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">FRPB</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
           <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
           <a href="#" class="d-block">{{ auth()->user()->name }}</a>
       </div>
   </div>
   <!-- Sidebar Menu -->
   <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
               <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                       Dashboard
                   </p>
               </a>
           </li>
           <li class="nav-item">
               <a href="{{ url('dashboard/users') }}" class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}">
                   <i class="nav-icon fas fa-user"></i>
                   <p>
                       User
                   </p>
               </a>
           </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Berita
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Daftar berita</p>
                    </a>
                    <a href="./index.html" class="nav-link">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Tambah kategori berita</p>
                    </a>
                </li>
            </ul>
        </li>
           <li class="nav-item">
               <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fas fa-copy"></i>
                   <p>
                       Organisasi
                   </p>
               </a>
           </li>
           <li class="nav-item">
               <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fas fa-chart-pie"></i>
                   <p>
                       Kebencanaan
                   </p>
               </a>
           </li>
           <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                      Agenda
                  </p>
              </a>
          </li>
           <li class="nav-item">
               <a href="#" class="nav-link">
                   <i class="nav-icon fas fa-book"></i>
                   <p>
                       Profil
                       <i class="right fas fa-angle-left"></i>
                   </p>
               </a>
               <ul class="nav nav-treeview">
                   <li class="nav-item">
                       <a href="./index.html" class="nav-link active">
                           <i class="far fa-plus-square nav-icon"></i>
                           <p>Daftar Profil</p>
                       </a>
                       <a href="./index.html" class="nav-link">
                           <i class="far fa-plus-square nav-icon"></i>
                           <p>Tambah profil</p>
                       </a>
                   </li>
               </ul>
           </li>
           <li class="nav-item">
               <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fas fa-image"></i>
                   <p>
                       Galeri
                   </p>
               </a>
           </li>
           <li class="nav-item">
               <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fas fa-th"></i>
                   <p>
                       Anggota
                   </p>
               </a>
           </li>
           <li class="nav-item">
               <a href="pages/widgets.html" class="nav-link">
                   <i class="nav-icon fas fa-tree"></i>
                   <p>
                       Aspirasi
                   </p>
               </a>
           </li>
       </ul>
   </nav>
   <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
