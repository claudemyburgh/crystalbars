@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <div class="row testimonial--padding">
        <div class="md-col-6">
            <div class="panel panel--default" itemscope itemtype="http://schema.org/Person">
                <div class="panel__header">
                    <h2 class="color--primary" itemprop="name">Luis Pechau</h2>

                </div>
                <div class="panel__body">
                    <ul>
                        <li itemprop="telephone"><a href="tel:0727554303">072 755 4303</a></li>
                        <li itemprop="email"><a href="malto:luis@crystalbars.co.za">luis@crystalbars.co.za</a></li>
                    </ul>
                </div>
            </div>
        </div>    
        <div class="md-col-6">
            <div class="panel panel--default" itemscope itemtype="http://schema.org/Person">
                <div class="panel__header">
                   <h2 class="color--primary" itemprop="name">Hendry Olewagen</h2>
                </div>
                <div class="panel__body">
                                     
                   <ul>
                       <li itemprop="telephone"><a href="tel:0794912812">079 491 2812</a></li>
                       <li itemprop="email"><a href="malto:hendry@crystalbars.co.za">hendry@crystalbars.co.za</a></li>
                   </ul>   
                </div>
            </div>
        </div>
    </div>
@include('layouts.partials._socialblock')
    <div class="row">
        <div class="md-col-12">
                <iframe src="https://www.google.com/maps/d/embed?mid=1TOF0VrW-G939d0HbTWpHqj_Y1bnTUfBu" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>

@endsection
