@extends('frontlayout')
@section('content')
    <div class="container-fluid">




        <!-- DataTables  -->
        <form method="get" action="{{ url('post') }}">
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
                    Posts
                    <a href="{{ url('post/create') }}" class="float-right btn btn-sm btn-dark">Add Post</a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->category->title ?? "Don't have" }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td><img src="{{ asset('imgs/full') . '/' . $post->full_img }}" width="100" /></td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('post/' . $post->id . '/edit') }}">Update</a>
                                            <a onclick="return confirm('Are you sure you want to delete?')"
                                                class="btn btn-danger btn-sm"
                                                href="{{ url('post/' . $post->id . '/delete') }}">Delete</a>
                                        </td>
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
