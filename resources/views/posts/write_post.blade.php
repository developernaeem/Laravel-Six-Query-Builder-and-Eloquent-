@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-8 col-md-10 mx-auto">
    			<a href="{{ route('add_category') }}" class="btn btn-danger">Add Category</a>
    			<a href="{{ route('all_category') }}" class="btn btn-info">All Category</a>
                <a href="{{ route('all_post') }}" class="btn btn-info">All Posts</a>
    			<hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    			<form action="{{ route('store_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Post Title</label>
    						<input type="text" class="form-control" placeholder="Title" name="title">
    					</div>
    				</div>
    				<br>
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Category</label>
    						<select class="form-control" name="category_id">
                                @foreach($category as $row)
    							 <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
    						</select>
    					</div>
    				</div>
    				<br>
    				<div class="control-group">
    					<div class="form-group col-xs-12 floating-label-form-group controls">
    						<label>Post Image</label>
    						<input type="file" class="form-control" name="image">
    					</div>
    				</div>
    				<div class="control-group">
    					<div class="form-group floating-label-form-group controls">
    						<label>Post Details</label>
    						<textarea rows="5" class="form-control" name="details" placeholder="Details"></textarea>
    					</div>
    				</div>
    				<br>
    				<div id="success"></div>
    				<div class="form-group">
    					<button type="submit" class="btn btn-primary">Send</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
@endsection