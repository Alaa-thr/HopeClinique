@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Blog</h4>
                    </div>
                    <div class="col-sm-4 col-8 text-right m-b-30">
                        <a class="btn btn-primary btn-rounded float-right" href="add-blog.html"><i class="fa fa-plus"></i> Add Blog</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-01.jpg')}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco sit laboris.</p>
                                <a href="{{route('detailsBlog')}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-02.jpg')}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco sit laboris.</p>
                                <a href="{{route('detailsBlog')}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-03.jpg')}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco sit laboris.</p>
                                <a href="{{route('detailsBlog')}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-04.jpg')}}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco sit laboris.</p>
                                <a href="{{route('detailsBlog')}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection