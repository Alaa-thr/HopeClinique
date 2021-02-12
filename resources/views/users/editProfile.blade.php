@extends('layouts.scrtrDoctorApp')
@section('content')
	        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{ url('updateProfile') }}" method="post">
                    {{  csrf_field() }}
                	<input type="hidden" name="_method" value="PUT">
                    <div class="card-box">
                        <h3 class="card-title">Basic Informations</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap">
                                    <img class="inline-block" src="{{asset('storage/'.$user->avatar)}}" alt="user" >
                                    <div class="fileupload btn">
                                        <span class="btn-text">edit</span>
                                        <input class="upload @error('avatar') is-invalid @enderror" type="file" name='avatar'>
                                        @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label class="focus-label">First Name</label>
                                                <input type="text" class="form-control floating @error('first_name') is-invalid @enderror" value="{{$user->nom}}" name="first_name" >
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                                <label class="focus-label">Last Name</label>
                                                <input type="text" class="form-control floating @error('last_name') is-invalid @enderror" value="{{$user->prenom}}" name="last_name">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6 m-t-20">
                                                <label class="focus-label">Gendar</label>
                                                <select class="select form-control floating @error('gender') is-invalid @enderror" name="gender">
                                                    <option value="{{$user->gender}}" selected>{{$user->gender}}</option>
                                                    @if($user->gender == 'male')
                                                    	<option value="female">Female</option>
                                                    @else
                                                    	<option value="male">Male</option>
                                                    @endif
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <h3 class="card-title">Contact Informations</h3>
                        <div class="row">
                            <div class="col-md-6">
                                    <label class="focus-label">Address Email</label>
                                    <input type="text" class="form-control floating @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" name="email">
                                    @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                    <label class="focus-label">Phone Number</label>
                                    <input type="text" class="form-control floating @error('phone_number') is-invalid @enderror" value="{{Auth::user()->phone}}" name="phone_number">
                                    @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn " type="submit" >Save</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
