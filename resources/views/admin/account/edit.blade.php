@extends('admin.layouts.master')

@section('title','Edit Profile Page')

@section('content')
{{-- Main content --}}
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{ route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div>
            <div class="col-lg-10 offset-1">
                <div class="card" style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);" >
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Account Profile</h3>
                        </div>
                        <hr>
                        <form action="{{ route('admin#update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 offset-1">
                                    @if (Auth::user()->image == null)
                                    <img  src="{{ asset('image/default_user.png')}}" alt="Default User" class="shadow-sm" style="border-radius: 10px;">
                                    @else
                                    <img src="{{ asset('storage/'.Auth::user()->image)}}" alt="{{ Auth::user()->name}}" />
                                    @endif
                                    <div class="mt-3 d-flex justify-content-center">
                                        <button type="submit" class="col-12 btn bg-dark text-white text-center">
                                            <i class="fa-solid fa-arrow-up mr-2"></i>Update
                                        </button>
                                    </div>
                                </div>

                                <div class="col-5 offset-1">
                                    <div class="form-group">
                                        <input type="file" name="image" id="" class="form-control">
                                         @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Name</label>
                                        <input name="name" type="text" value="{{ old('name',Auth::user()->name)}}" class="form-control  @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your name...">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input name="email" type="email" value="{{ old('email',Auth::user()->email)}}" class="form-control   @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your email...">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Address</label>
                                        <input name="address" type="text" value="{{ old('address',Auth::user()->address)}}" class="form-control   @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your address...">
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Phone</label>
                                        <input name="phone" type="number" value="{{ old('phone',Auth::user()->phone)}}" class="form-control   @error('phone') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter your phone..." >
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Gender</label>
                                        <select name="gender" class="form-control  @error('gender') is-invalid @enderror">
                                            <option value="">Choose Gender</option>
                                            <option value="male" @if(Auth::user()->gender == 'male') selected @endif > Male</option>
                                            <option value="female"  @if(Auth::user()->gender == 'female') selected @endif>Female</option>
                                        </select>
                                        @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Role</label>
                                        <input name="role" type="text" value="{{ old('role',Auth::user()->role)}}" class="form-control   @error('role') is-invalid @enderror" aria-required="true" aria-invalid="false" disabled>
                                        @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message}}
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Main content --}}
@endsection

