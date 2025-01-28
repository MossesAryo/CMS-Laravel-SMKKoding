@extends('front.layout.template')

@section('content')
  <!-- Page content-->
  <div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Blog post detail-->
            <div class="card mb-4">
                <img class="card-img-top featured-img" src="{{ asset('storage/'.$articles->img) }}" alt="{{ $articles->title }}" />
                <div class="card-body">
                    <div class="small text-muted">{{ $articles->created_at->format('d-m-Y') }}</div>
                    <div class="small text-muted">{{ $articles->Category->name }}</div>
                    <h1 class="card-title">{{ $articles->title }}</h1>
                    <p class="card-text">{!! $articles->desc !!}</p>
                    <a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        @include('front.layout.side-widgets')
    </div>
</div>

@endsection