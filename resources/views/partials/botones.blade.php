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
                                        <li class="menu-item"><a href="{{route('foro')}}">Foro</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li>
                                    <a href="#">Contacto</a> 
                                </li>
                                @auth
                                <li><a href="#">{{Auth::user()->name}}</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{route('blog')}}">Perfil</a></li>
                                        <li class="menu-item"><a href="{{route('blog')}}">Aprendizaje</a></li>
                                        <hr>
                                        <li class="menu-item"><a href="{{route('blog')}}">Temas</a></li>
                                        <li class="menu-item"><a href="{{route('blog')}}">Respuestas</a></li>
                                        <hr>
                                        <li class="menu-item"><a a href="javascript:void" onclick="$('#logout-form').submit();">Cerrar Sesión</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                    </ul><!-- sub-menu -->
                                </li>
                                @endauth
                                <li class="nav-sing">
                                    @guest
                                    <a class="sing-in btn btn-success" href="{{ route('login') }}">Iniciar sesión</a>
                                    @endguest
                                    @auth
                                    @if(Auth::user()->roles->first()->title == "Admin" || Auth::user()->roles->first()->title == "Teacher" )

                                    <a class=" btn btn-primary" href="/admin" target="_blank">Admin Panel</a>
                                    @endif
                                    @endauth
                                </li>
                            </ul>