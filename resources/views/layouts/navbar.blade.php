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
                                <i class="ti ti-home"></i>
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
                                <i class="ti ti-rss"></i>
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
                                <i class="ti ti-play-football"></i>
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
                                <i class="ti ti-copy"></i>
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
                                <i class="ti ti-settings"></i>
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
                                <i class="ti ti-notebook"></i>
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
                                <i class="ti ti-movie"></i>
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
                                <i class="ti ti-list-check"></i>
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
                                <i class="ti ti-file-type-doc"></i>
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
