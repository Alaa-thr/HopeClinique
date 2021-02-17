@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
	<div class="content">
    @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> The  Image
                @if(Session::get('success') == 'delete')
                    has been <strong>deleted</strong> successfully.
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      @endif
			<div class="row">
					<div class="col-sm-12">

					</div>
			</div>
								<div class="content">
										<div  class="row">
											@foreach($images as $img)
											<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-b-20">
												<a href="{{asset('storage/'.$img->image)}}">
												 <img class="img-thumbnail" src="{{asset('storage/'.$img->image)}}" alt="" id="c">
												</a>
											 </div>
                       <div class="text-right" >
                         <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                           <div class="dropdown-menu dropdown-menu-right">
                             <form action="{{ url('deleteImg') }}" method="post" id="deleteBtn">
               								{{  csrf_field() }}
                              <input type="hidden" name="_method"  value="DELETE">
               									<div class="row">
               										<div class="col-sm-12 col-12 text-right m-b-40">
               											<button style="margin-top: -35px;">
               												<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department"
               												onclick="deleteUser()">
               												<i class="fa fa-pencil m-r-5"></i> Delete Image</a>
               												</button>
               											<input type="hidden" value="{{$img->id}}" name="idImg">
               										</div>
               									</div>
               								</form>

                           </div>
                         </div>
                       </div>
											@endforeach
										</div>
								</div>
							<div class="sidebar-overlay" data-reff=""></div>
					</div>

  		</div>
	</div>
<script src="{{asset('scrtrDoctorPage/js/blogs.js')}}"></script>
@endsection
