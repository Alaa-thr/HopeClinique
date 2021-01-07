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
                    <div class="col-md-8">
                        <div class="blog-view">
                            <article class="blog blog-single-post">
                                <h3 class="blog-title">Do you know the ABCs of Health Care?</h3>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a></li>
                                            <li><a href="#."><i class="fa fa-user-o"></i> <span>By Andrew Dawis</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-image">
                                    <a href="#."><img alt="" src="{{ asset('scrtrDoctorPage/img/blog/blog-01.jpg')}}" class="img-fluid"></a>
                                </div>
                                <div class="blog-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                    <blockquote>
                                        <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p>
                                    </blockquote>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                </div>
                            </article>
                        </div>
                    </div>
                    <aside class="col-md-4">
                        <div class="widget search-widget">
                            <h5>Blog Search</h5>
                            <form class="search-form">
                                <div class="input-group">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       <div class="widget post-widget">
                            <h5>Latest Posts</h5>
                            <ul class="latest-posts">
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-thumb-01.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
											<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
										</h4>
                                        <p><i aria-hidden="true" class="fa fa-calendar"></i> December 6, 2017</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-thumb-02.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
											<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
										</h4>
                                        <p><i aria-hidden="true" class="fa fa-calendar"></i> December 6, 2017</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-thumb-03.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
											<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
										</h4>
                                        <p><i aria-hidden="true" class="fa fa-calendar"></i> December 6, 2017</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="{{ asset('scrtrDoctorPage/img/blog/blog-thumb-04.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
											<a href="blog-details.html">Lorem ipsum dolor sit amet consectetur</a>
										</h4>
                                        <p><i aria-hidden="true" class="fa fa-calendar"></i> December 6, 2017</p>
                                    </div>
                                </li>
                            </ul>
                        </div>  
                    </aside>
                </div>
            </div>
        </div>
@endsection