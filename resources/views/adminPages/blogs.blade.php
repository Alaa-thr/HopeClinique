@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Blog</h4>
                    </div>
                    <div class="col-sm-4 col-8 text-right m-b-30">
                        <a class="btn btn-primary btn-rounded float-right" href="{{ url('blog/'.Auth::user()->id)}}"><i class="fa fa-plus"></i> Add Blog</a>
                    </div>
                </div>
                <div class="row">
                  @foreach($blogs as $b)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="#">
                                  <img class="img-fluid" src="{{asset('storage/'.$b->avatr)}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="blog-details.html">{{$b->title}}?</a></h3>
                                <p>{{$b->description}}.</p>
                                <a href="{{ url('detailsBlog/'.$b->id)}}" class="read-more"><i class="fa fa-long-arrow-right"></i> More</a>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <a href="#."><i class="fa fa-calendar"></i> <span>{{$b->created_at}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12" id="row">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection
