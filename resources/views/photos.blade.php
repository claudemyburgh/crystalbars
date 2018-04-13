@extends('layouts.app')

@section('title', 'Images of clear bars')

@section('content')


    <div class="row">
        <div class="col"><h1>{{ ucwords($category->name) }}</h1></div>
        
    </div>
    <div class="row ">
        <div class="isotope">

        @if($category->photos()->count())
            @foreach ($category->photos as $photo)
            <div class="sm-col-6 md-col-3">
                <div class="panel panel--default">
                    <div class="panel__body">
                        <a data-lightbox="{{ $category->slug }}" href="{{ Storage::url($photo->path)  }}">
                            <img class="responsive__image" src="{{ Storage::url($photo->path)  }}" alt="{{ config('app.name') }} - {{ $category->name }} - {{ $photo->name }}">
                        </a>
                       
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <p class="text-align-center">No image uploaded for {{ ucwords($category->name) }}</p>
        @endif
    </div>
@include('layouts.partials._socialblock')
    <div class="row">
        <div class="md-col-12">
                <iframe src="https://www.google.com/maps/d/embed?mid=1TOF0VrW-G939d0HbTWpHqj_Y1bnTUfBu" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
      })
    </script>
@endsection