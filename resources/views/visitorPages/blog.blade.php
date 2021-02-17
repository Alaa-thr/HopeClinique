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
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('storage/'.$b->avatr)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <h5><a href="{{ url('detailsBlog/'.$b->id)}}">{{$b->title}}</a></h5>
                            <ul>
                                <li> BY {{strtoupper ($b->nom) }} {{strtoupper ($b->prenom) }}</li>
                                <li>{{$b->created_at}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
    </section>
@endsection
