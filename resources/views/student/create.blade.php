@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-8 col-md-10 mx-auto">
    			<a href="{{ route('all_student') }}" class="btn btn-info">All Students</a>
    			<hr>
                <h3>New Student Insert</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    			<form action="{{ route('store_student') }}" method="post">
    				@csrf
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Student Name</label>
    						<input type="text" class="form-control" placeholder="Student Name" name="name">
    					</div>
    				</div>
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Email</label>
    						<input type="email" class="form-control" placeholder="Student Email" name="email">
    					</div>
    				</div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Student Phone" name="phone">
                        </div>
                    </div>
    				<br>
    				<div class="form-group">
    					<button type="submit" class="btn btn-primary">Submit</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
@endsection