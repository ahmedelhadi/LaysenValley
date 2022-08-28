@extends('layouts.front')

@section('content')

<section id="about" class="section pt-5 pb-5 vh-100">
    <div class="d-flex">
        <div class="col-12 col-sm-4">
            <div class="block ms-5 mt-5 animate__animated animate__fadeInDown text-white" >
                <h1 class="block-title mb-5 animate__animated animate__bounceInRight animate__delay">
                    {{$about->getTitle() ?? 'About'}} 
                </h1>
                <p class="block-caption text-justify animate__animated animate__bounceInRight animate__delay-2s">
                    {{$about->getDesc() ?? 'From Saudi Arabia, the leading investment force, Laysen Valley will shape the future of Riyadh to be an advanced model of an integrated environment with several activities, which will fulfill the Kingdom’s Vision2030of improving the quality of life, enhancing trade and pushing the economy forward .'}} 

                    
                </p>
            </div>	
        </div>

        <div class="col-12 col-sm-7 offset-sm-1 position-absolute  end-0 decor-1"">
            <img class="img-fluid block-image" src="{{$about->image ?? 'https://fakeimg.pl/1092x800/'}}  ">
        </div>
    </div>
</section>


<section id="valley" class="section pt-5 vh-100">
    <div class="x2">
        <div class="cloud"></div>
    </div>
    <div class="x1">
        <div class="cloud1"></div>
    </div>

    <div class="container">
        @if($spiritblock)
            <div  class="col-12 col-sm-4 offset-sm-8 ">
                <h2 class="mb-4 animate__animated animate__bounceInRight animate__delay-1s">{{$spiritblock->getTitle()}}</h2>

                <p class="text-white animate__animated animate__bounceInRight animate__delay-2s">{{$spiritblock->getDesc()}}</p>
            </div>
        @else
            <div  class="col-12 col-sm-4 offset-sm-8 ">
                <h2 class="mb-4 animate__animated animate__bounceInRight animate__delay-1s">THE SPIRIT OF NAJD, COMBINED WITH MODERNITY</h2>

                <p class="text-white animate__animated animate__bounceInRight animate__delay-2s">The distinctive, vibrant design of Laysen Valley is inspired from the Salmani architecture, which highlights the characteristics of the ancient spirit of Najd and the spirit of modernity.</p>
            </div>

        @endif

    </div>
</section>

<section id="land" class="section pt-5 vh-100">
    <div class="container">

        @if($block7)

							
            @if(count($block7->attributes)>0)

                @foreach($block7->attributes as $key => $attribute)

                    @if($key == 0)
                    <div class="col-12 col-sm-1 offset-sm-10 text-end mb-5 animate__animated animate__bounceInLeft">
                    @elseif($key == 1)
                    <div class="col-12 col-sm-1 offset-sm-6 text-end mb-5 animate__animated animate__bounceInLeft">
                    @elseif($key == 2)
                    <div class="col-12 col-sm-1 offset-sm-9 text-end mb-5 animate__animated animate__bounceInLeft">
                    @elseif($key == 3)
                    <div class="col-12 col-sm-2 offset-sm-3 text-end mb-5 animate__animated animate__bounceInLeft">
                    @elseif($key == 4)
                    <div class="col-12 col-sm-1 offset-sm-11 text-end mb-5 animate__animated animate__bounceInLeft">
                    @else
                    <div class="col-12 col-sm-1 offset-sm-10 text-end mb-5 animate__animated animate__bounceInLeft">
                    @endif
                        <div class="text-center">
                            @if( $attribute->slug == 'dg')
                                <span class="h6">{{$attribute->getTitle()}}</span>
                            @else
                                <img src="{{url($attribute->image ?? 'assets/images/minute-1.png')}}" alt="">
                            @endif
                            <div class="number mb-1 mt-1 pb-1">{{$attribute->counter}}</div>
                            <div class="duration">{{$attribute->getSubTitle()}}</div>
                        </div>
                    </div>


                @endforeach
            @endif



        @else 
        <div class="col-12 col-sm-1 offset-sm-10 text-end mb-5 animate__animated animate__bounceInLeft">
            <div class="text-center">
                <img src="{{url('assets/images/minute-1.png')}}" alt="">
                <div class="number mb-1 mt-1 pb-1">7</div>
                <div class="duration">Minutes</div>
            </div>
        </div>
        <div class="col-12 col-sm-1 offset-sm-6 text-start mb-5 animate__animated animate__bounceInLeft animate__delay-2s">
            <div class="text-center">
                <span class="h6">D Q</span>
                <div class="number mb-1 mt-1 pb-1">7</div>
                <div class="duration">Minutes</div>
            </div>
        </div>
        <div class="col-12 col-sm-1 offset-sm-9 text-end mb-5 animate__animated animate__bounceInLeft animate__delay-3s" >
            <div class="text-center">
                <img src="{{url('assets/images/minute-3.png')}}" alt="">
                <div class="number mb-1 mt-1 pb-1">7</div>
                <div class="duration">Minutes</div>
            </div>
        </div>
        <div class="col-12 col-sm-2 offset-sm-3 text-end mb-2 animate__animated animate__bounceInLeft animate__delay-4s">
            <div class="text-center">
                <img src="{{url('assets/images/96IuiCCe_400x4002.png')}}" alt="">
                <div class="duration">KING KHALID EYE SPECIALIST HOSPITAL</div>
            </div>
        </div>
        <div class="col-12 col-sm-1 offset-sm-11 text-end mb-5 animate__animated animate__bounceInLeft animate__delay-5s">
            <div class="text-center">
                <img src="{{url('assets/images/minute-4.png')}}" alt="">
                <div class="number mb-1 mt-1 pb-1">7</div>
                <div class="duration">Minutes</div>
            </div>
        </div>
        @endif

    </div>
</section>


<section id="counters" class="section pt-5 pb-5">
    <div class="container">
        <div class="row">

            @if($counters)
                @if(count($counters->attributes)>0)

                    @foreach($counters->attributes as $key => $attribute)
                        <div class="col-12 col-sm-3 d-flex  justify-content-center align-items-center border-end border-white  animate__animated animate__bounceInLeft">
                            <div class="image float-start me-2 d-flex justify-content-center align-items-center h4">
                                @if($attribute->slug == 'from-diplomatic-quarter') D Q @else  <img class="" src="{{asset($attribute->image ?? 'assets/images/green-1.png')}}" alt="">  @endif
                            </div>
                            <div class="body ">
                                <h5 class="mb-1">{{$attribute->getSubTitle()}}</h5>
                                <p class="mb-0">{{$attribute->getTitle()}}</p>
                            </div>
                        </div>
        
                    @endforeach

                @endif
            @endif



 

        </div>
    </div>
</section>


<section id="features" class="section pt-5 pb-5 vh-100">
    <div class="container">
        <div class="title text-center mb-5">
            <h2>{{trans('file.features')}}</h2>
        </div>

        @if(count($features)>0)

            @foreach($features as $key => $feature)

            @if($key == 0)
                <div class="d-flex justify-content-evenly mb-3 animate__animated animate__bounceInLeft animate__delay">
            @elseif($key == 3)
                <div class="d-flex justify-content-evenly mb-3 animate__animated animate__bounceInLeft animate__delay-2s">
            @elseif($key == 7)
                <div class="d-flex justify-content-evenly mb-3 animate__animated animate__bounceInLeft animate__delay-3s">
            @endif
                <div class="col-12 col-sm-2 text-center ">
                    <img class="mb-3" src="{{asset($feature->icon ?? 'assets/images/feature-1.png')}}" alt="">
                    <h2 class="mb-1">{{$feature->counter}}</h2>
                    <small>{{$feature->getTitle()}}</small>
                </div>

            @if($key == 2 || $key == 6 || $key == 10)
                </div>
            @endif

            @endforeach


       

        @endif



    </div>
</section>



<section id="info" class="section pt-5 pb-5 vh-100 ">
    <div class="container h-100">

        <div class="d-flex justify-content-evenly align-items-center h-100 animate__animated animate__bounceInLeft animate__delay">

        @if($info)
        @if(count($info->attributes)>0)

            @foreach($info->attributes as $key => $attribute)
            
                <div class="col-12 col-sm-2 text-center">
                    <img class="mb-3" src="{{asset($attribute->image ?? 'assets/images/counter-1.png')}}" alt="">
                    <h2 class="mb-1">{{ $attribute->counter }}</h2>
                    <small>{{$attribute->getSubTitle()}}</small>
                </div>
    
            @endforeach

        @endif
        @endif

        
        </div>

    </div>
</section>

@endsection
