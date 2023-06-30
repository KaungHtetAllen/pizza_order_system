@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
{{-- Main content --}}
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Product List</h2>

                        </div>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{ route('product#createPage')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add Pizza
                            </button>
                        </a>
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                @if(session("createSuccess"))
                <div class="col-4 offset-8 alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-thumbs-up mr-1"></i> {{ session('createSuccess')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                @if(session("deleteSuccess"))
                <div class="col-4 offset-8 alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-thumbs-up mr-1"></i>{{ session('deleteSuccess')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if(session("passwordChangeSuccess"))
                <div class="col-5 offset-7 alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-thumbs-up mr-1"></i>{{ session('passwordChangeSuccess')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif


                <div class="row">
                    <div class="col-4">
                        <h4 class="text-secondary"> Search Key : <span style="text-decoration: underline"class="text-danger">{{ request('key') }}</span></h4>
                    </div>
                    <div class="col-3 offset-5">
                        <form action="{{ route('category#list')}}" method="get">
                            @csrf
                            <div class="d-flex">
                                <input type="text" name="key" class="form-control" value="{{ request('key')}}"placeholder="Search...">
                                <button type="submit" class="btn bg-dark text-center">
                                    <i class="fa-solid fa-magnifying-glass text-white"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row my-2 p-3">
                    <div  style="border-radius: 10px" class="col-3 bg-secondary py-2 text-center text-capitalize text-bold">
                        <h3 style="color: rgb(255, 255, 255)">Total : {{ $pizzas->total()}}</h3>
                    </div>
                </div>

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>View Count</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pizzas as $p)
                            <tr class="tr-shadow">
                                <td class="col-2"><img src="{{ asset('storage/'. $p->image)}}" class="img-thumbnail shadow-sm"></td>
                                <td class="col-2">{{ $p->name}}</td>
                                <td class="col-2">{{ $p->category_id}}</td>
                                <td class="col-2">{{ $p->price}}</td>
                                <td class="col-2"><i class="fa-solid fa-eye mr-2"></i>{{ $p->view_count}}</td>
                                <td class="col-2">
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </button>
                                        <a href="">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </a>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">

                    </div>
                </div>

                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
{{-- Main content --}}
@endsection

