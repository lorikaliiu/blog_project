@extends('frontlayout')
@section('content')
<div class="container-fluid">



  <!-- DataTables  -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Posts
      <a href="{{url('post/create')}}" class="float-right btn btn-sm btn-dark">Add Post</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Title</th>
              <th>Thumbail</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($data as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{ $post->category->title ?? "Don't have" }}</td>
                <td>{{$post->title}}</td>
                <td><img src="{{ asset('imgs/thumb').'/'.$post->thumb }}" width="100" /></td>
                <td><img src="{{ asset('imgs/full').'/'.$post->full_img }}" width="100" /></td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('post/'.$post->id.'/edit')}}">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('post/'.$post->id.'/delete')}}">Delete</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

@endsection
