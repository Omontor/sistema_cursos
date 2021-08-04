<div class="bg-header" @yield('background')>
        <div class="flat-header-blog">
            <div class="top-bar clearfix">
             
            </div>
            <header class="header menu-bar header-blog hv-menu-type2">
                <div class="container"> 
                    <div class="menu-bar-wrap clearfix">
                        <div id="logo" class="logo">
                            <a href="index.html"><img src="/images/logo/02.png" alt="images"></a>
                        </div>
                        <div class="mobile-button"><span></span></div>
                        <div class="header-menu">
                            <nav id="main-nav" class="main-nav">
                                @include('partials.botones')
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <div class="page-title page-title-blog">
                <div class="page-title-inner">
                    <div class="breadcrumbs breadcrumbs-blog text-left">
                        <div class="container">
                            <div class="breadcrumbs-wrap">
                                <div class="title">
                                   @yield('name')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- bg-header -->