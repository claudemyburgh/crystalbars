@extends('layouts.app')

@section('title', 'Window styles')

@section('content')
    <div class="row testimonial--padding">
        <div class="md-col-12 text-align-center">
            <hgroup class="heading__group">
            <h1 class="text--primary">Window with <strong>Burglar Bars</strong> on.</h1>
            <h4><em>Browse through our list of window style categories</em></h4>
            </hgroup>
            <p>
                See how our burglar bars look on diffrance style window frames and patio doors.
            </p>
        </div>
        </div>
        <div class="row">
        @foreach ($categories as $category)
            <div class="md-col-3">
                <div class="panel panel--default">
                    <div class="panel__header text-align-center">
                        <a href="{{ route('categories.photos', $category) }}">{{ ucwords($category->name) }}</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    <div class="row isotope">
        @foreach ($photos as $photo)
        <div class="sm-col-6 md-col-3">
            <div class="panel panel--default">
                <div class="panel__body">
                    <a data-lightbox="set" href="{{ Storage::url($photo->path)  }}">
                        <img class="responsive__image" src="{{ Storage::url($photo->path)  }}" alt="{{ config('app.name') }} - {{ $photo->name }}">
                    </a>
                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
