<ul class="menu">
                                <li>
                                    <a href="{{ url('/') }}">Inicio</a>
                                </li>
                                <li>
                                    <a href="{{route('cursos.index')}}">Cursos</a> 
                                </li>
                                <li><a href="#">Nosotros</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{route('about')}}">Acerca de</a></li>
                                        <li class="menu-item"><a href="{{route('instructors')}}">Instructores</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li><a href="#">Comunidad</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{route('blog')}}">Blog</a></li>
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
                                    @if(Auth::user()->roles->first()->title == "Admin" || Auth::user()->roles->first()->title == "Teacher" )

                                    <a class=" btn btn-primary" href="/admin" target="_blank">Admin Panel</a>
                                    @else
                                    <a class=" btn btn-primary" href="/admin" target="_blank">Perfil</a>
                                    @endif
            
                                    <a class=" btn btn-danger" href="{{ route('register') }}">Cerrar sesión</a>
                                    @endauth
                                </li>
                            </ul>