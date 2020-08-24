<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle" style="cursor:default;">
          <a href="javascript:void(0)" style="cursor:default;">
              <img class="img-responsive" src="{{ asset('theme') }}/assets/images/not-found.png" alt="avatar"/>  
          </a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username" style="cursor:default;">Admin</a></h5>
          <small>Nama </small>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->
  @php
      $menu = Request::path();
  @endphp
  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">

        <li class="{{ strpos($menu,'dashboard')!==false ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li>
       
        <li class="menu-separator"><hr></li>
          <div class="text-muted" style="margin-left: 18px; margin-bottom: 10px">Master Data</div>

          <li class="{{ strpos($menu,'organization')!==false ? 'active' : '' }}">
            <a href="{{ route('data-barang.index') }}">
              <i class="menu-icon fa fa-building"></i>
              <span class="menu-text">Data Barang</span>
            </a>
          </li>
          {{-- <li class="{{ request()->is('users') ? 'active' : '' }}">
            <a href="">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-text">Users</span>
            </a>
          </li> --}}

      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>