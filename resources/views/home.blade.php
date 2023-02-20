@extends('frontlayout')
@section('content')
    <div class="container-fluid">


        <!-- Icon Cards-->
        <div class="row justify-content-center">
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">{{ \App\Models\Category::count() }} Categories</div>
                    </div>
                    @auth
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('category') }}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    @endauth
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-address-card"></i>
                        </div>
                        <div class="mr-5">{{ \App\Models\Post::count() }} Posts</div>
                    </div>
                    @auth
                        <a class="card-footer text-white clearfix small z-1" href="{{ url('post') }}">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    @endauth
                </div>
            </div>

        </div>


        <!-- DataTables  -->
        <form method="get" action="{{ url('/') }}">
            @csrf
            <ol class="breadcrumb">
                <div class="input-group">
                    <button class="btn bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                    </button>
                    <input list="q" name="q" type="text" class="form-control" placeholder="Search...">
                    <div class="input-group-addon">
                    </div>
                </div>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Recent Posts
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    @auth
                                        <th>Action</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->category->title ?? "Don't have" }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td><img src="{{ asset('imgs/full') . '/' . $post->full_img }}" width="100" /></td>
                                        @auth
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ url('post/' . $post->id . '/edit') }}">Update</a>
                                                <a onclick="return confirm('Are you sure you want to delete?')"
                                                    class="btn btn-danger btn-sm"
                                                    href="{{ url('post/' . $post->id . '/delete') }}">Delete</a>
                                            </td>
                                        @endauth
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
