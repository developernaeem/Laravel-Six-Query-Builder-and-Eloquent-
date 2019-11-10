@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-8 col-md-10 mx-auto">
    			<a href="{{ route('all_student') }}" class="btn btn-info">All Students</a>
    			<hr>
                <h3>Student Update</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    			<form action="{{ url('update-student/'.$student->id) }}" method="post">
    				@csrf
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Student Name</label>
    						<input type="text" class="form-control" value="{{ $student->name }}" name="name">
    					</div>
    				</div>
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Email</label>
    						<input type="email" class="form-control" value="{{ $student->email }}" name="email">
    					</div>
    				</div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="{{ $student->phone }}" name="phone">
                        </div>
                    </div>
    				<br>
    				<div class="form-group">
    					<button type="submit" class="btn btn-primary">Update</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
@endsection