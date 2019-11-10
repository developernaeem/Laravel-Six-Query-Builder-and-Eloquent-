@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12 col-md-10 mx-auto">
    			<a href="{{ route('students') }}" class="btn btn-danger">New Student</a>
    			<a href="{{ route('all_student') }}" class="btn btn-info">All Student</a>
    			<hr>
                <div>
                    <ol>
                        <li>Student Id: {{ $student->id }}</li>
                        <li>Student Name: {{ $student->name }}</li>
                        <li>Student Email: {{ $student->email }}</li>
                        <li>Created Phone: {{ $student->phone }}</li>
                        <li>Created at: {{ $student->created_at }}</li>
                    </ol>
                </div>
    		</div>
    	</div>
    </div>
@endsection