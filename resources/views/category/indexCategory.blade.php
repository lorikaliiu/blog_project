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
                    <input list="q" name="q" type="text" class="form-control" placeholder="Search...">
                    <div class="input-group-addon">
                        <button class="btn bg-transparent">
                            <i class="fa fa-times"></i>
                        </button>
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
                                    <th>#</th>
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
