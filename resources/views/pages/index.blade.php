@extends('welcome')

@section('content')

<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    @foreach($post as $row)
      <div class="post-preview">
        <a href="{{ URL::to('view-post/'.$row->id) }}">
          <img src="{{ URL::to($row->image) }}" style="height: 250px; width: 300px;" alt="Post Image">
          <h2 class="post-title">
            {{ $row->title }}
          </h2>
        </a>
        <p class="post-meta">Category
          <a href="#">{{ $row->name }}</a>
        on Slug {{ $row->slug }}</p>
      </div>
      <hr>
    @endforeach

    <!-- Pager -->
    <div class="clearfix">
      {{-- Pagination Links --}}
      {{ $post->links() }}
    </div>
  </div>
</div>

@endsection