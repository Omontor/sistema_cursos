            <!-- Slider-->
                    @include('pages.index.slider')
                    @include('pages.index.newsletter')
            <!-- Si no hay registrados featured courses no mostramos este bloque -->
                    @if($featured->count() > 0)
                    @include('pages.index.featured')
                    @endif
            <!-- Si no hay registrados bullets no mostramos este bloque -->
                    @if($bullets->count() > 0)
                    @include('pages.index.bullets')
                    @endif
            <!-- Si no hay Acerca de no mostramos este bloque -->
                    @if($about != null)
                    @include('pages.index.about')
                    @else
                    @endif
            <!-- Si no hay razones registradas no mostramos este bloque -->
                    @if($reasons->count() > 0)
                    @include('pages.index.reasons')
                    @endif
            <!-- Si no hay eventos registrados no mostramos este bloque -->
                    @if($classes->count() > 0)
                    @include('pages.index.classes')
                    @endif
            <!-- Si no hay testimonios registrados no mostramos este bloque -->
                    @if($testimonials->count() > 0)
                    @include('pages.index.testimonials')
                    @endif
            <!-- Si no hay testimonios registrados no mostramos este bloque -->
                    @if($posts->count() > 0)
                    @include('pages.index.blog')
                    @endif       
            <!-- Si no hay testimonios registrados no mostramos este bloque -->
                    @if($ctas)
                    @include('pages.index.cta')
                    @endif



    