<ul class="menu">
                                <li>
                                    <a href="{{ url('/') }}">Inicio</a>
                                </li>
                                <li>
                                    <a href="{{route('cursos.index')}}">Cursos</a> 
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
                                    @guest
                                    <a class="sing-in btn btn-success" href="{{ route('login') }}">Iniciar sesión</a>
                                    @endguest
                                    @auth
                                    <a class="sing-up btn btn-danger" href="{{ route('register') }}">Cerrar sesión</a>
                                    @endauth
                                </li>
                            </ul>