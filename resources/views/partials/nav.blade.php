<header class="header flat-header lh-header header-style1">
            <div class="site-header-inner">
                <div class="container">
                    <div id="logo" class="logo">
                        <a href="index.html"><img src="images/logo/02.png" alt="images"></a>
                    </div>
                    <div class="mobile-button"><span></span></div>
                    <div class="header-menu">
                        <nav id="main-nav" class="main-nav">
                            <ul class="menu">
                                <li>
                                    <a href="{{ url('/') }}">Inicio</a>
                                </li>
                                <li>
                                    <a href="#">Cursos</a> 
                                </li>
                                <li><a href="#">Nosotros</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="#">Instructores</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li><a href="#">Comunidad</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="#">Blog</a></li>
                                        <li class="menu-item"><a href="#">Foro</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li>
                                    <a href="#">Contacto</a> 
                                </li>
                                <li class="nav-sing">
                                    <a class="sing-in" href="{{ route('login') }}">Iniciar sesión</a>
                                    <a class="sing-up" href="{{ route('register') }}">Cerrar sesión</a>
                                </li>
                            </ul>
                        </nav>
                    </div> 
                </div>
            </div>
        </header><!-- header -->
