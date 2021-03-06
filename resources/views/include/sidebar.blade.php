<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('dashboard.index')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('category.index')}}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('kuesioner.index')}}">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Kuesioner</span>
                  </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('guest.index')}}">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Buku tamu</span>
                  </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
        </div>
      </div>
    </div>
  </nav>
