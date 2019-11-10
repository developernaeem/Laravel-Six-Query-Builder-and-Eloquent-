@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12 col-md-10 mx-auto">
    			<a href="{{ route('write_post') }}" class="btn btn-info">Write Post</a>
    			<hr>
                <table class="table table-responsive">
                    <tr>
                        <th>SL No</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach($post as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->title }}</td>
                            <td><img src="{{ URL::to($row->image) }}" style="width: 70px; height: 50px;" alt="Post Image"></td>
                            <td>
                                <a href="{{ URL::to('edit-post/'.$row->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ URL::to('delete-post/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                <a href="{{ URL::to('view-post/'.$row->id) }}" class="btn btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
    		</div>
    	</div>
    </div>
@endsection