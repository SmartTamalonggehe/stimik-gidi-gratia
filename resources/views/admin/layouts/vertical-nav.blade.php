 <div class="hk-menu">
     <!-- Brand -->
     <div class="menu-header">
         <span>
             <a class="navbar-brand" href="index.html">
                 <img class="brand-img img-fluid" src="{{ asset('assets_admin/dist/img/brand-sm.svg') }}" alt="brand" />
                 <img class="brand-img img-fluid" src="{{ asset('assets_admin/dist/img/Jampack.svg') }}" alt="brand" />
             </a>
             <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                 <span class="icon">
                     <span class="svg-icon fs-5">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                             <line x1="10" y1="12" x2="20" y2="12"></line>
                             <line x1="10" y1="12" x2="14" y2="16"></line>
                             <line x1="10" y1="12" x2="14" y2="8"></line>
                             <line x1="4" y1="4" x2="4" y2="20"></line>
                         </svg>
                     </span>
                 </span>
             </button>
         </span>
     </div>
     <!-- /Brand -->

     <!-- Main Menu -->
     <div data-simplebar class="nicescroll-bar">
         <div class="menu-content-wrap" id="sidebar">
             <div class="menu-group">
                 <ul class="navbar-nav flex-column">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('admin') }}">
                             <i data-feather="home" class="me-3"></i>
                             <span class="nav-link-text">Dashboard</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('admin.jenis') }}">
                             <i data-feather="slack" class="me-3"></i>
                             <span class="nav-link-text">Jenis</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('admin.persembahan') }}">
                             <i data-feather="box" class="me-3"></i>
                             <span class="nav-link-text">Persembahan</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
                             data-bs-target="#dash_chatpop">
                             <i data-feather="dollar-sign" class="me-3"></i>
                             <span class="nav-link-text">Keuangan</span>

                         </a>
                         <ul id="dash_chatpop" class="nav flex-column collapse  nav-children">
                             <li class="nav-item">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <a class="nav-link" href="chatpopup.html"><span
                                                 class="nav-link-text">Pemasukan</span></a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" href="chatbot.html"><span
                                                 class="nav-link-text">Pengeluaran</span></a>
                                     </li>
                                 </ul>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>

         </div>
     </div>
     <!-- /Main Menu -->
 </div>
 <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
