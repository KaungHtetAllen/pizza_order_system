@extends('admin.layouts.master')

@section('title','Account Info Page')

@section('content')
{{-- Main content --}}
<div class="main-content">
    <div class="row">
        <div class="col-3 offset-7 ">
            @if(session("updateSuccess"))
            <div class=" alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-thumbs-up mr-1"></i>{{ session('updateSuccess')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
        </div>
    </div>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{ route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div>
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Account Info</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3 offset-2 d-flex justify-content-center align-items-center">
                                @if (Auth::user()->image == null)
                                <img  src="{{ asset('image/default_user.png')}}" alt="Default User" class="shadow-sm" style="border-radius: 10px">
                                @else
                                <img src="{{ asset('storage/' .Auth::user()->image)}}" alt="{{ Auth::user()->name}}" />
                                @endif
                            </div>
                            <div class="col-4 offset-1 ">
                                <div >
                                    <h3 class="my-3"><i class="fa-solid fa-user-pen mr-2"></i>{{ Auth::user()->name}}</h3>
                                    <h3 class="my-3"><i class="fa-solid fa-envelope-circle-check mr-2"></i>{{ Auth::user()->email}}</h3>
                                    <h3 class="my-3"><i class="fa-solid fa-phone mr-2"></i>{{ Auth::user()->phone}}</h3>
                                    <h3 class="my-3"><i class="fa-solid fa-venus-mars mr-2"></i>{{ Auth::user()->gender}}</h3>
                                    <h3 class="my-3"><i class="fa-solid fa-location-dot mr-2"></i>{{ Auth::user()->address}}</h3>
                                    <h3 class="my-3"><i class="fa-solid fa-user-clock mr-2"></i>{{ Auth::user()->created_at->format('j-F-Y')}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 offset-2 mt-4 text-center">
                                <a href="{{ route('admin#edit')}}">
                                    <button class="btn btn-dark text-white">
                                        <i class="fa-solid fa-pen-to-square mr-2"></i> Edit Profile
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Main content --}}
@endsection

