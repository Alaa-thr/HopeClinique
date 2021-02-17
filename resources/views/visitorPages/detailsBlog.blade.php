@extends('layouts.app')
@section('content')
<section class="blog-details spad">
        <div class="container">
          @foreach($detailBlog as $b)
            <div class="blog__details__hero set-bg" data-setbg=" {{asset('storage/'.$b->avatr)}}">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7 text-center">
                        <div class="blog__hero__text">
                            <h2 style="color: black">{{$b->title}}</h2>
                            <ul >
                                @foreach($user as $u)
                                  @if($u->nom == NULL)
                                    <li style="color: black">By {{strtoupper ($b->nom_medecin ) }} {{strtoupper ($b->prenom_medecin) }}</li>
                                  @else
                                    <li style="color: black">By {{strtoupper ($u->nom ) }} {{strtoupper ($u->prenom) }}</li>
                                  @endif
                                @endforeach
                                <li style="color: black">{{$b->created_at}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__text">
                        <div class="blog__details__text__item">
                            <h5>Step 1 - Anesthesia</h5>
                            <p>{{$b->description}}.</p>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </section>
<!-- Breadcrumb Section Begin -->
<!--section class="breadcrumb-option spad set-bg" id="section">
        <div id="serviceImg">
          <img src="{{ asset('visitorPage/img/breadcrumb-bg.jpg')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Our Details Blogs</h2>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="/blogs">Blogs</a>
                            <span>Details Blogs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <section class="contact spad">
        <div class="container">
                  <div class="row" id="tbl">
                    @foreach($detailBlog as $b)
                      <div class="col-md-8">
                          <div class="blog-view">
                              <article class="blog blog-single-post"
                                  <h3 class="blog-title">Do you know {{$b->title}}?</h3>
                                  <div class="blog-info clearfix">
                                      <div class="post-left">
                                          <ul>
                                              <li><a href="#."><i class="fa fa-calendar"></i> <span>{{$b->created_at}}</span></a></li>
                                              <li><a href="#."><i class="fa fa-user-o"></i>
                                                @foreach($user as $u)
                                                @if($u->nom == NULL)
                                                <span>By {{strtoupper ($b->nom_medecin ) }} {{strtoupper ($b->prenom_medecin) }}</span>
                                                @else
                                                <span>By {{strtoupper ($u->nom ) }} {{strtoupper ($u->prenom) }}</span>
                                                @endif
                                                @endforeach
                                              </a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="blog-image">
                                      <a href="#."><img alt="" src="{{asset('storage/'.$b->avatr)}}" class="img-fluid"></a>
                                  </div>
                              </article>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="blog-view">
                              <article class="blog blog-single-post">
                                  <div class="blog-content">
                                      <p id="Detailsblogs">{{$b->description}}</p>
                                  </div>
                              </article>
                          </div>
                      </div>

                    @endforeach
                  </div>
        </div>
    </section-->
@endsection
