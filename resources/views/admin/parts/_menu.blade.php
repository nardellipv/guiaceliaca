<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">
                        <li class="list-header">Navigation</li>
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span class="menu-title">
												<strong>Dashboard</strong>
											</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.userCreate') }}">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">
												<strong>Crear Usuarios</strong>
											</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.listNewsLetter') }}">
                                <i class="fa fa-pencil"></i>
                                <span class="menu-title">
												<strong>Listado NewsLetter</strong>
											</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span class="menu-title">Blog</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="{{ route('admin.listBlog') }}"><i class="fa fa-caret-right"></i> Listado
                                        Post</a></li>
                                <li><a href="{{ route('admin.createBlog') }}"><i class="fa fa-caret-right"></i> Crear
                                        nuevo</a></li>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                <span class="menu-title">
												<strong>Salir</strong>
											</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li class="list-divider"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>