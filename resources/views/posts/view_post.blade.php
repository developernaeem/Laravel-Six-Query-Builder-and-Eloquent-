@extends('welcome')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12 col-md-10 mx-auto">
                <a href="{{ route('write_post') }}" class="btn btn-info">Write Post</a>
                <a href="{{ route('all_post') }}" class="btn btn-success">All Posts</a>
    			<hr>
                <div>
                    <h3>{{ $post->title }}</h3>
                    <img src="{{ URL::to($post->image) }}" height="340px;" alt="Post Image">
                    <p>Category Name : <strong>{{ $post->name }}</strong></p>
                    <p>{{ $post->details }}</p>
                </div>
    		</div>
    	</div>
    </div>
@endsection