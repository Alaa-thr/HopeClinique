@extends('layouts.app')
@section('content')
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option spad set-bg" id="section">
            <div id="serviceImg">
              <img src="{{ asset('visitorPage/img/breadcrumb-bg.jpg')}}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Our Blogs</h2>
                            <div class="breadcrumb__links">
                                <a href="/">Home</a>
                                <span>Blogs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
          <div class="row">
            @foreach($blogs as $b)
              <div style="margin-bottom:30px;" class="col-sm-6 col-md-6 col-lg-4">
                  <div class="blog grid-blog">
                      <div class="blog-image">
                          <a href="blog-details.html">
                            <img class="img-fluid" src="{{asset('storage/'.$b->avatr)}}" alt=""></a>
                      </div>
                      <div class="blog-content">
                          <h3 class="blog-title"><a href="blog-details.html">Do You Know the {{$b->title}}?</a></h3>
                          <p>{{$b->description}}.</p>
                          <a href="{{ url('detailsBlogVisiteur/'.$b->id)}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
                          <div class="blog-info clearfix">
                              <div class="post-left">
                                  <ul>
                                      <li><a href="#."><i class="fa fa-calendar"></i> <span>{{$b->created_at}}</span></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
        </div>
    </section>
@endsection
