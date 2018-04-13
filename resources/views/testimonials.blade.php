@extends('layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="row">
        <div class="md-col-6 md-offset-3 ">
            <p class="text-align-center">
                <a href="#" id="createTest" class="btn btn--primary">CREATE TESTIMONIAL</a>
               
            </p>

            <div class="hide" id="testfrom">
                @auth
                    <div class="panel panel--default ">
                        <div class="panel__body">
                            <form action="{{ route('testimonials.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form__group {{ $errors->has('name') ? ' has__danger' : '' }}">
                                    <label for="name" class="form__label">Fullname: {{ auth()->user()->name }}</label>
                                    <input type="hidden" name="name" id="name" class="form__item" value="{{ auth()->user()->name }}">
                                    @if ($errors->has('name'))
                                       <span class="form__helper">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form__group {{ $errors->has('testimonial') ? ' has__danger' : '' }}">
                                    <label for="testimonial" class="form__label">Testimonial</label>
                                    <textarea class="form__item" name="testimonial" id="testimonial" class="form__item" cols="30" rows="5">{{ old('testimonial') }}</textarea>
                                    @if ($errors->has('testimonial'))
                                       <span class="form__helper">{{ $errors->first('testimonial') }}</span>
                                    @endif
                                </div>

                                <div class="form__group">
                                    <label for="stars" class="form__label">Stars</label>
                                    <select name="stars" id="stars" class="form__item">
                                        <option value="1">One Star</option>
                                        <option value="2">Two Stars</option>
                                        <option value="3">Three Stars</option>
                                        <option value="4">Four Stars</option>
                                        <option value="5">Five Stars</option>
                                    </select>
                                </div>



                                <div class="form__group">
                                    <button class="btn btn--primary">Post</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                @else 
                <div class="clearfix">
                    <p class="text-align-center">

                         <a href="{{ route('login') }}/github" class="btn">Login with GitHub</a>
                         <a href="{{ route('login') }}/facebook" class="btn btn--primary">Login with Facebook</a>
                        
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row testimonial--padding isotope">

            @if ($testimonials->count())
                @foreach ($testimonials as $testimonial)
                <div class="md-col-6 avatar__main">
                    <div class="panel panel--default">
                        <div class="panel__header avatar">
                           <img class="avatar--small" src="{{ $testimonial->user->avatar }}" alt="{{ config('app.name') }} testimonial from  {{ $testimonial->name }}">
                          <p> {{ $testimonial->name }}</p>
                        </div>
                        <div class="panel__body">
                            {{ $testimonial->testimonial }}
                            <p>
                                <em><u>Star rating</u></em>
                                <br>
                                 @foreach (range(1, $testimonial->stars) as $star)
                                    <i class="lunacon lunacon-star-solid stars"></i>            
                                 @endforeach   

                            </p>
                        </div>
                    </div>
                 
                </div>
                @endforeach
            @endif

    </div>

    <div class="row">
        <div class="col">
            {{ $testimonials->links() }}
        </div>
    </div>

@endsection
