@extends('layouts.app')
@section('title', 'Add Categories')
@section('content')

<div class="md-col-12">
    <div class="panel panel--default">
        <div class="panel__header">Create Window Style <a href="{{ route('admin.main.index') }}" class="btn btn--sm md-float-right">Back</a></div>

        <div class="panel__body">   
            <form action="{{ route('admin.categories.store') }}" method="post">
                {{ csrf_field() }}
                
                <div class="form__group {{ $errors->has('name') ? ' has__danger' : '' }}">
                    <label for="name" class="form__label">Name </label>
                    <input type="text" name="name" id="name" class="form__item" value="{{ old('name') }}" autofocus="true">
                    @if ($errors->has('name'))
                    <small class="form__helper">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="form__group">
                    <button type="submit" class="btn btn--primary">Create</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
