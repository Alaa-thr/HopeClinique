@extends('layouts.scrtrDoctorApp')
@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Blog View</h4>
                    </div>
                </div>
                <div class="row">
                  @foreach($detailBlog as $b)
                    <div class="col-md-12">
                        <div class="blog-view">
                            <article class="blog blog-single-post">
                                <h3 class="blog-title">{{$b->title}}?</h3>
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
                                <div class="blog-content">
                                    <p>{{$b->description}}</p>
                                </div>
                            </article>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
@endsection
