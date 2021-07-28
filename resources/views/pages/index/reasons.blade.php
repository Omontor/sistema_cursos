<section class="flat-benefit style1 clearfix" style="background-image: url('/images/estudiante_fondo.jpg');">
        <div class="container-fluid">
            <div class="col-benefit-left">
                <div class="wrap-inconbox-benefit">
                    <div class="title-section">
                        <div class="flat-title small heading-type2 text-white">Razones para tomar un curso con nosotros</div>
                    </div>
                    <div class="iconbox-benefit iconbox-benefit-style1">
                        <div class="row">
                        	@forelse($reasons as $reason)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
                                <div class="themesflat-content-box" data-padding="0% 4% 0% 0%" data-sdesktoppadding="0% 0% 0% 0%" data-ssdesktoppadding="0% 0% 0% 0%"data-mobipadding="0% 0% 0% 0%" data-smobipadding="0% 0% 0% 0%" >
                                    <div class="iconbox">
                                        <div class="iconbox-icon">
                                            <i class="{{$reason->icon}} fa-5x" style="color:white;"></i>
                                        </div>
                                        <div class="iconbox-content img-one">
                                            <h3>
                                                <a href="#">{{$reason->title}}</a>
                                            </h3>

                                            <p>
                                                {{$reason->content}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        	@empty
                        	@endforelse

         
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-benefit-right">
                                  <div>
                        <div class="apply-admission">
                            <div class="apply-admission-wrap type2 bd-type1">
                                <div class="apply-admission-inner">
                                    <h2 class="title text-center">
                                        <span>¿Eres instructor?</span>
                                    </h2>
                                    <div class="caption text-center">
                                       Regístrate con nosotros para poder vender tus cursos y clases en línea.
                                       <br>
                                       <br>
                                        <button class="btn-browse-courses btn-dark"> Registrarse</button>
                                    </div>
                                
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </section><!-- flat-benefit -->