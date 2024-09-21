    <div class="top-nav-wrapper navbar"> <!-- important to have 'navbar' bootstrap toggler-->
        <div class="container">
            {{-- @auth
                <div class="top-nav-menu-title col-12 col-md-4 mt-3 mt-md-0">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            @endauth --}}
            <div class="top-nav-menu-middle col-6 col-md-4 mt-3 mt-md-0">
                <div class="container-fluid">
                    <h3 class="text-left m-0" style="color:rgba(7, 92, 62);">alcea coffee &#169</h3>
                </div>
            </div>
            <div class="top-nav-menu-right col-6 col-md-4 mt-3 mt-md-0">
                <div class="container-fluid d-flex justify-content-end">
                    @guest
                        <a href="#" class="login-show btn d-none align-items-center d-md-flex"><span
                                class="mt-1 me-2">Login</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </a>
                        <a href="#" class="register-show btn d-none align-items-center d-md-flex"><span
                                class="mt-1 me-2">Register</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('logout') }}" class="btn d-none align-items-center d-md-flex"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="mt-1 me-2">Logout</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-nav-wrapper">
        @auth
        <nav class="desktop-menu">
            <div class="container">
                <ul>
                    <li>
                        <a href="{{ route('dashboard.dashboard_view') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.inventory_view') }}">Inventory</a>
                    </li>
                    <li class="desktop-dropdown-menu">
                        <a href="#">item 3</a>
                        <ul>
                            <li><a href="#">Item 3.1</a></li>
                            <li><a href="#">Item 3.2</a></li>
                            <li><a href="#">Item 3.3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        @endauth
        <nav>
            <div class="mobile-menu collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mobile-menu-list">
                    @auth
                    <li>
                        <a href="{{ route('dashboard.dashboard_view') }}"><span class="mt-1 me-2">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.inventory_view') }}"><span class="mt-1 me-2">Inventory</span></a>
                    </li>
                    <li class="mobile-has-submenu">
                        <a href="#" data-submenu="item-3"><span class="mt-1 me-2">items</span></a>
                        <ul class="mobile-submenu">
                            <div class="container pb-3 m-0 d-flex  align-content-center">
                                <button class="back-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                                    </svg>
                                </button>
                                <h6 class="submenu-title mx-auto" align="center">Inventory</h6>
                            </div>
                            <li><a href="{{ route('dashboard.dashboard_view') }}">Inventory Dashboard</a></li>
                            <li><a href="#">Item 3.2</a></li>
                            <li><a href="#">Item 3.3</a></li>
                        </ul>
                    </li>
                    @endauth
                    @guest
                    <li>
                        <a href="#" class="login-show d-flex align-items-center d-md-flex"><span
                                class="mt-1 me-2">Login</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="register-show d-flex align-items-center d-md-flex"><span
                            class="mt-1 me-2">Register</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        </a>
                    </li>
                    @endguest
                    @auth
                    <li>
                        <a href="{{ route('logout') }}" class="d-flex align-items-center d-md-flex"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="mt-1 me-2">Logout</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
