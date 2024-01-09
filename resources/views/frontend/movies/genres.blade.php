@extends('layouts.frontend.app')

@section('page_css')
    <style>
        .slide-item {
            padding-bottom: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid" style="padding-top: 80px;">
        <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            <h4>Movies <i class="fas fa-angle-right fa-sm"></i> {{ $genre->name }}</h4>
            <form action="{{ route('frontend.movies.genres', $genre->id) }}" method="GET">
                <div class="input-group">
                    <input class="form-control border-secondary" name="keywords" value="{{ request()->keywords }}"
                           placeholder="Search...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary px-3"><i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if(isset($movies) && $movies->isNotEmpty())
            @if(request()->has('keywords') && request()->keywords)
                <div class="mb-4">
                    Found <strong>{{ $movies->total() }}</strong> results in <strong>{{ $movies->lastPage() }}</strong>
                    pages,
                    matching <strong>{{ request()->keywords }}</strong>
                </div>
            @endif

            <ul class="list-inline row p-0 mb-5 iq-rtl-direction">
                @foreach($movies as $item)
                    <li class="slide-item">
                        <div class="block-images position-relative">
                            <div class="img-box">
                                <img src="{{ getPoster($item) }}" class="img-fluid">
                            </div>
                            <div class="block-description">
                                <h6 class="iq-title">
                                    <a href="{{ getRoute($item) }}">{{ $item->title }}</a>
                                </h6>
                                <div class="movie-time d-flex align-items-center my-2 iq-ltr-direction">
                                    <div class="badge badge-secondary p-1 mr-2">{{ $item->content_rating }}+
                                    </div>
                                    <span class="text-white">{{ getDuration($item) }}</span>
                                </div>
                                <div class="hover-buttons">
                                    <a href="{{ getRoute($item) }}" class="btn btn-hover iq-button">
                                        <i class="fa fa-play mr-1"></i>
                                        Play Now
                                    </a>
                                </div>
                            </div>
                            @include('frontend.social', ['resource' => $item])
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="d-flex justify-content-end">
                {{ $movies->links() }}
            </div>
        @elseif(request()->has('keywords') && request()->keywords)
            <div class="mb-4">
                Found <strong>{{ $movies->total() }}</strong> results in <strong>{{ $movies->lastPage() }}</strong>
                pages,
                matching <strong>{{ request()->keywords }}</strong>
            </div>
        @else
            <div>No resource found</div>
        @endif
    </div>
@endsection

@section('page_js')
@endsection