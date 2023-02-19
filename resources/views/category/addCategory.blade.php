@extends('frontlayout')
@section('content')
<div class="container-fluid">

  


    <!-- DataTables  -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i> Add Category
        <a href="{{url('category')}}" class="float-right btn btn-sm btn-dark">All Categories</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">

          @if($errors)
            @foreach($errors->all() as $error)
              <p class="text-danger">{{$error}}</p>
            @endforeach
          @endif

          @if(Session::has('success'))
          <p class="text-success">{{session('success')}}</p>
          @endif

          <form method="post" action="{{url('category')}}" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title" class="form-control" /></td>
                </tr>
                <tr>
                    <th>Detail</th>
                    <td><input type="text" name="detail" class="form-control" /></td>
                </tr>
                <tr>
                    <th>Image for Category</th>
                    <td><input type="file" name="cat_image" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" />
                    </td>
                </tr>
            </table>
          </form>
        </div>
      </div>
      
    </div>

  </div>
  
  @endsection('content')