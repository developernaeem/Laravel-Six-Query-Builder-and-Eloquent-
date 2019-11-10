@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12 col-md-10 mx-auto">
    			<a href="{{ route('students') }}" class="btn btn-danger">Add Student</a>
    			<hr>
                <table class="table table-responsive">
                    <tr>
                        <th>SL No</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Phone</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    @foreach($student as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <a href="{{ URL::to('edit-student/'.$row->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ URL::to('delete-student/'.$row->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                <a href="{{ URL::to('view-student/'.$row->id) }}" class="btn btn-success">View</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
    		</div>
    	</div>
    </div>
@endsection