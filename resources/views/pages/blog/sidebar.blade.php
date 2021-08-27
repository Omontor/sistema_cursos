<div class="col-lg-4">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <div class="search-blog-wrap">
                                <form action="{{route('blog.search')}}" class="search-form" method="POST">
                                	@csrf
                                    <input type="text" placeholder="Buscar ...." name="searchterm">
                                    <button class="search-button" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i> 
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="widget widget-categories">
                            <h4 class="widget-title">
                                <span>Categorías</span>
                            </h4>
                            <ul class="categories-wrap">
                                @forelse($categories as $category)
                                <li><a href="{{route('blog.filter', $category->title)}}">{{$category->title}}</a></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="widget widget-latest-post">
                            <h4 class="widget-title">
                                <span>Posts Recientes</span>
                            </h4>
                            <div class="latest-post">
                                <ul class="latest-post-wrap">

                                    @forelse(App\Models\Blog::latest()->take(3)->get() as $latest)
                                      <li>
                                        <div class="thumb-new">
                                            <img src="{{$latest->thumb_image->getUrl()}}" alt="images" style="max-width: 100px;">
                                        </div>
                                        <div class="thumb-new-content clearfix">
                                            <h5 class="thumb-new-title">
                                                <a href="{{route('blog.show', $latest->slug)}}">
                                                   {{$latest->title}}
                                                </a>
                                            </h5>
                                            <p class="thumb-new-day">
                                                {{$latest->created_at->diffForHumans()}}
                                            </p>
                                        </div>
                                    </li>
                                    @empty
                                    @endforelse

                                  
                                    
                                    
                                </ul>
                            </div>
                        </div>

                        
                    </div>
                </div>