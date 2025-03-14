<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ url('/') }}">
                <svg width="110" height="32" viewBox="0 0 150 50" class="navbar-brand-image" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <rect x="5" y="5" width="40" height="40" rx="10" fill="#007AFF"/>
                    <path d="M20 20L30 25L20 30" stroke="white" stroke-width="3" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <text x="55" y="35" font-family="Arial, sans-serif" font-size="28" fill="#333" font-weight="bold">
                        gewor
                    </text>
                </svg>
            </a>
        </div>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                       aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="icon icon-1">
                            <path
                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"/>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"/>
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span
                                                class="status-dot status-dot-animated bg-red d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 1</a>
                                            <div class="d-block text-secondary text-truncate mt-n1">
                                                Change deprecated html tags to text decoration classes (#29604)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler.io/icons/icon/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="icon text-muted icon-2">
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                   aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{ asset('static/pp.png') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Gewor</div>
                        <div class="mt-1 small text-secondary">Palu Gada</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Status</a>
                    <a href="#" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="#" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none"
                                                                                                          d="M0 0h24v24H0z"
                                                                                                          fill="none"/><path
                                        d="M5 12l-2 0l9 -9l9 9l-2 0"/><path
                                        d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/><path
                                        d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-rss"><path stroke="none"
                                                                                                         d="M0 0h24v24H0z"
                                                                                                         fill="none"/><path
                                        d="M5 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/><path d="M4 4a16 16 0 0 1 16 16"/><path
                                        d="M4 11a9 9 0 0 1 9 9"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Feed
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-play-football"><path
                                        stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                        d="M11 4a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"/><path d="M3 17l5 1l.75 -1.5"/><path
                                        d="M14 21v-4l-4 -3l1 -6"/><path d="M6 12v-3l5 -1l3 3l3 1"/><path
                                        d="M19.5 20a.5 .5 0 1 0 0 -1a.5 .5 0 0 0 0 1z" fill="currentColor"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Bola
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ isActiveRoute('laptops.*') }}">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-copy"><path stroke="none"
                                                                                                          d="M0 0h24v24H0z"
                                                                                                          fill="none"/><path
                                        d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z"/><path
                                        d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Scrap
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('laptops.*') ? 'active' : '' }}" href="{{ route('laptops.index') }}" rel="noopener">
                                Laptop
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('tools.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path
                                        stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/><path
                                        d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Tools
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('tools.ip-finder') ? 'active' : '' }}" href="{{ route('tools.ip-finder') }}" rel="noopener">
                                Ip Finder
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-notebook"><path
                                        stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                        d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"/><path
                                        d="M13 8l2 0"/><path d="M13 12l2 0"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Journal
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ isActiveRoute('animes.*') }}">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-movie"><path stroke="none"
                                                                                                           d="M0 0h24v24H0z"
                                                                                                           fill="none"/><path
                                        d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"/><path
                                        d="M8 4l0 16"/><path d="M16 4l0 16"/><path d="M4 8l4 0"/><path d="M4 16l4 0"/><path
                                        d="M4 12l16 0"/><path d="M16 8l4 0"/><path d="M16 16l4 0"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Movie
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('animes.*') ? 'active' : '' }}"
                               href="{{ route('animes.index') }}" rel="noopener">
                                Anime
                            </a>
                            <a class="dropdown-item" href="#" rel="noopener">
                                Movie
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-list-check"><path
                                        stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                                        d="M3.5 5.5l1.5 1.5l2.5 -2.5"/><path d="M3.5 11.5l1.5 1.5l2.5 -2.5"/><path
                                        d="M3.5 17.5l1.5 1.5l2.5 -2.5"/><path d="M11 6l9 0"/><path d="M11 12l9 0"/><path
                                        d="M11 18l9 0"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Todo
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item" href="#" rel="noopener">
                                Dashboard
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown  {{ isActiveRoute('topics.*') }}">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-doc"><path
                                        stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path
                                        d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"/><path
                                        d="M5 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"/><path
                                        d="M20 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0"/><path
                                        d="M12.5 15a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1 -3 0v-3a1.5 1.5 0 0 1 1.5 -1.5z"/></svg>
                            </span>
                            <span class="nav-link-title">
                                Course
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a class="dropdown-item {{ request()->routeIs('topics.*') ? 'active' : '' }}"
                               href="{{ route('topics.index') }}" rel="noopener">
                                Topics
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
