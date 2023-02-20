@extends('frontlayout')
@section('meta_desc', $meta_desc)
@section('title', $title)
@section('content')
    <div class="container-fluid">


        <!-- DataTables  -->
        <form method="get" action="{{ url('category') }}">
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
                    Categories
                    @auth
                        <a href="{{ url('category/create') }}" class="float-right btn btn-sm btn-dark">Add Categories</a>
                    @endauth
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Image Of Category</th>
                                    @auth
                                        <th>Action</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $cat)
                                    <tr>
                                        <td>{{ $cat->id }}</td>
                                        <td>{{ $cat->title }}</td>
                                        <td><img src="{{ asset('imgs') . '/' . $cat->image }}" width="100" /></td>
                                        @auth
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ url('category/' . $cat->id . '/edit') }}">Update</a>
                                                <a onclick="return confirm('Are you sure you want to delete?')"
                                                    class="btn btn-danger btn-sm"
                                                    href="{{ url('category/' . $cat->id . '/delete') }}">Delete</a>
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
