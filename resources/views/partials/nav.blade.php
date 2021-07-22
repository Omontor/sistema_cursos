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
                                <li><a href="{{ url('/') }}">Home</a>
                                </li>
                                <li><a href="course.html">Course</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="course.html">Course</a></li>
                                        <li class="menu-item"><a href="course-list.html">Course list</a></li>
                                        <li class="menu-item"><a href="course-single.html">Course single</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li><a href="#">Explore</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="about.html">About</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li><a href="#">Degrees</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="blog.html">Blog</a></li>
                                        <li class="menu-item"><a href="blog-single.html">Blog single</a></li>
                                    </ul><!-- sub-menu -->
                                </li>
                                <li class="nav-sing">
                                    <a class="sing-in" href="{{ route('login') }}">Sing In</a>
                                    <a class="sing-up" href="{{ route('register') }}">Sing Up</a>
                                </li>
                            </ul>
                        </nav>
                    </div> 
                </div>
            </div>
        </header><!-- header -->
