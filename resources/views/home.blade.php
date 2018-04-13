@extends('layouts.app')

@section('title', 'Admin pages section')

@section('content')
<div class="wrapper">
    <div class="row">
        <div class="md-col-8 md-offset-2">
            <div class="panel panel--default">
                <div class="panel__header">Welcome {{ auth()->user()->name }}</div>

                <div class="panel__body">
                    <p>
                        You are signed into {{ config('app.name') }}
                    </p>
                    <p>
                        Go to the <a href="{{ url('/') }}">Home page</a>          
                    </p>

                    @role('admin')
                        admin
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
