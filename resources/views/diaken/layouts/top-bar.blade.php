  <nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
      <div class="container-fluid">
          <!-- Start Nav -->
          <div class="nav-start-wrap flex-fill">
              <!-- Brand -->
              <a class="navbar-brand d-xl-flex d-none flex-shrink-0" href="">
                  <img class="brand-img img-fluid" src="{{ asset('images/logo-gidi.png') }}" width="60px"
                      alt="brand" /> </a>
              <!-- /Brand -->
              <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span
                      class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>

              <!-- Navbar Nav -->
              <div class="hk-menu">
                  <!-- Brand -->
                  <div class="menu-header d-xl-none">
                      <span>
                          <a class="navbar-brand" href="">
                              <img class="brand-img img-fluid" src="{{ asset('assets_diaken/dist/img/brand-sm.svg') }}"
                                  alt="brand" />
                              <img class="brand-img img-fluid" src="{{ asset('assets_diaken/dist/img/Jampack.svg') }}"
                                  alt="brand" />
                          </a>
                          <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                              <span class="icon">
                                  <span class="svg-icon fs-5">
                                      <svg xmlns="http://www.w3.org/2000/svg"
                                          class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24"
                                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                          fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                          <line x1="10" y1="12" x2="20" y2="12">
                                          </line>
                                          <line x1="10" y1="12" x2="14" y2="16">
                                          </line>
                                          <line x1="10" y1="12" x2="14" y2="8">
                                          </line>
                                          <line x1="4" y1="4" x2="4" y2="20">
                                          </line>
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
                                      <a class="nav-link" href="{{ route('diaken') }}">
                                          <span class="nav-link-text">Dashboard</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('diaken.laporan') }}">
                                          <span class="nav-link-text">Laporan Keuangan</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- /Main Menu -->
              </div>
              <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
              <!-- /Navbar Nav -->

          </div>
          <!-- /Start Nav -->

          <!-- End Nav -->
          {{-- right-top  --}}
          @include('diaken.layouts.right-top')
          <!-- /End Nav -->
      </div>
  </nav>
