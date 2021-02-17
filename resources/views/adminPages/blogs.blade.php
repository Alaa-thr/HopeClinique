@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
              @if(session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success!</strong> The Blog
                          @if(Session::get('success') == 'delete')
                              has been <strong>deleted</strong> successfully.
                          @endif
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                @endif
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
                          <div class="text-right" >
                            <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <form action="{{ url('updateBlog/'.$b->id) }}" method="get" id="updateBtn">
                                    {{  csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department"
                                    onclick="UpdateUser()">
                                    <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                </form>
                                <form action="{{ url('deleteBlog') }}" method="post" id="deleteBtn">
                                    {{  csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="idUser" value="{{$b->id}}">
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteUser()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </form>
                              </div>
                            </div>
                          </div>
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
<script src="{{asset('scrtrDoctorPage/js/blogs.js')}}"></script>
@endsection
