@extends('admin.layouts.master')

@section('title','Pizza Detail Page')

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
                <div class="card" style="border-radius: 20px">
                    <div class="card-body">
                        <div class="ml-1">
                            <a href="{{ route('product#list')}}" class="text-dark">
                                <i class="fa-solid fa-arrow-left fa-xl" onclick="history.back()"></i>
                            </a>
                        </div>
                        <div class="card-title">
                            <h3 class="text-center title-2">Pizza Details</h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3 offset-1 d-flex justify-content-center align-items-center">
                                <img  src="{{ asset('storage/'.$pizza->image)}}" alt="Default User" class="shadow-sm" style="border-radius: 10px">
                            </div>
                            <div class="col-8">
                                <div >
                                    <h3 class="my-3" style="text-transform:capitalize"><i class="fa-solid fa-pizza-slice fa-bounce mr-2"></i>{{ $pizza->name}}</h3>
                                    <span class="my-3 btn btn-dark text-white"><i class="fa-solid fa-dollar-sign mr-2"></i>{{ $pizza->price}}</span>
                                    <span class="my-3 btn btn-dark text-white"><i class="fa-solid fa-hourglass-half mr-2"></i>{{ $pizza->waiting_time}} (minutes)</span>
                                    <span class="my-3 btn btn-dark text-white"><i class="fa-solid fa-eye mr-2"></i>{{ $pizza->view_count}}</span>
                                    <span class="my-3 btn btn-dark text-white"><i class="fa-solid fa-database mr-2"></i>{{ $pizza->category_id}}</span>
                                    <span class="my-3 btn btn-dark text-white"><i class="fa-solid fa-user-clock mr-2"></i>{{ $pizza->created_at->format('j-F-Y')}}</span>
                                    <div class="mt-3" style="text-decoration: underline"><i class="fa-solid fa-circle-info mr-2"></i>Details</div>
                                    <div class="">{{ $pizza->description}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 offset-1 mt-4 text-center">
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

