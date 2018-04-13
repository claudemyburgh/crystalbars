@extends('layouts.app')

@section('title', 'Transparent burglar bars security systems')

@section('content')



<div class="hero__wrapper">
    <div class="hero robber-trigger">
        <div class="hero__image__container">
            <img class="hero__image" data-flickity-lazyload="{{ asset('img/van.jpg') }}" alt="">
        </div>
         <div class="hero__image__container">
            <img class="hero__image" data-flickity-lazyload="{{ asset('img/bakkie.jpg') }}" alt="">
        </div>
         <div class="hero__image__container">
            <img class="hero__image" data-flickity-lazyload="{{ asset('img/trailer.jpg') }}" alt="">
        </div>
    </div>
    <div class="robber"></div>
</div>


<div class="row">
    <div class="md-col-12">
     <hgroup class="heading__group">
         <h1 class="text--primary">Transparent Burglar Bars</h1>
         <h4><em>The strongest transparent burglar bars</em></h4>  
     </hgroup>

     <div class="flex-container clearfix">
        <div class="flex-first hero__wrapper robber-trigger2">
            <img src="{{ asset('img/zero.svg') }}" alt="">
            <div class="robber2"></div>
        </div>
         <div class="flex-last">
             <strong>Polycarbonate</strong> is the material that our <strong>clear burglar bars</strong> are made of , it is the strongest thermoplastic in the world. The material is <strong>virtually unbreakable</strong> and withstand a tremendous amount of force. They are flexible and have a tensile breaking strength of <strong>3000kg</strong>. It will be impossible to break the <strong>clear transparent burglar bars</strong> with a rock, hammer or shifting spanner. The <strong>Crystal Burglar Bars</strong> are fitted to all window types , wood , aluminium , steel , pvc and the window handles and hinges are accommodated so that you still have a smooth opening and closing window. It is great for estates and housing complexes where they have strict rules for burglar bar styles.
         </div>    
     </div>
 </div>
</div> <!--row-->

<div class="row">
    <div class="col">
        <div class="image__fold__wrapper">

            @foreach($photos as $photo)
            <div class="image__fold__holder">
      
                    <img class="image__fold" data-flickity-lazyload="{{ Storage::url($photo->path) }}" alt="">

            </div>
            @endforeach
        </div>
    </div>
</div> <!--row -->

   <div class="row">
       <div class="col text-align-center">
           <a class="btn btn--primary" href="{{ route('categories') }}">VIEW PHOTOS</a>
       </div>
   </div> 

<div class="row">
    <div class="md-col-12">
        <p>
            <strong>Crystal Bars</strong> : For our <strong>clear burglar bars</strong> we use A- grade polycarbonate that is imported from Europe. The <strong>transparent burglar bar</strong> is 6mm in thickness and 35mm in width. The bars are <strong>bevelled</strong> on both sides so that there are no sharp edges that could cut you when opening the windows. They are UV coated on both sides to prevent them from discolouring in the direct sun. The <strong>burglar bars</strong> are totally <strong>transparent</strong> so you will have an unobstructed view and have the most stylish <strong>clear burglar bars</strong> that will never rust and will never require any maintenance. Unfortunately with all security systems none of them are 100% intruder proof. Burglar bars are only a deterrent and should keep out your intruder until your security company or police arrive at your house.
        </p>
    </div>
</div>

@include('layouts.partials._socialblock')
<div class="row">
    <div class="md-col-12">
        <br>
        <div class="flex-container clearfix">
           <div class="flex-first hero__wrapper robber-trigger2">
               <img src="{{ asset('img/testimonials.svg') }}" alt="">
           </div>
            <div class="flex-last">
                <div class="testimonial__carousel">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial__section text-align-center ">
                            <img class="testimonial__avatar" src="{{ $testimonial->user->avatar }}" alt="{{ config('app.name') }} testimonial from  {{ $testimonial->name }}"> 

                            <div class="clearfix">
                                <h3>{{ $testimonial->user->name }}</h3>
                                {{ $testimonial->testimonial }}
                            </div>
                            <div class="clearfix">
                                 @foreach (range(1, $testimonial->stars) as $star)
                                    <i class="lunacon lunacon-star-solid stars"></i>            
                                 @endforeach   

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>    
        </div>
    </div>

</div>



@endsection
    