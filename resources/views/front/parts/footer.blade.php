<section id="footer" class="pt-5">
    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-3 block " data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <h2 class="text-uppercase">
                    {{ config('app.name', 'LAYSEN VALLEY') }}
                </h2>

                <ul class="list-unstyled">
                    <li><a class="text-uppercase" href="{{url('/pages/business')}}">{{trans('file.business')}}</a></li>
                    <li><a class="text-uppercase" href="{{url('/pages/taste')}}">{{trans('file.taste')}}</a></li>
                    <li><a class="text-uppercase" href="{{url('/pages/live')}}">{{trans('file.live')}}</a></li>
                    <li><a class="text-uppercase" href="{{url('/pages/contact-us')}}">{{trans('file.location')}}</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-3 block text-start text-sm-center " data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <h2 class="text-uppercase">
                    {{trans('file.media_center')}}
                </h2>

                <ul class="list-unstyled">
                    <li><a class="text-uppercase" href="{{route('gellary.index')}}"> {{trans('file.gallery')}}</a></li>

                </ul>
            </div>
            <div class="col-12 col-sm-3 block text-start text-sm-center  " data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <h2 class="text-uppercase">
                    {{trans('file.contact_center')}}
                </h2>

                <ul class="list-unstyled">
                    <li class="ltr"><a href="{{App\Models\Setting::where('name','phone')->first()->value ?? '#'}}">{{App\Models\Setting::where('name','phone')->first()->value ?? '+966 5X XXX XXXX' }} </a></li>
                    <li><a href="mail:{{App\Models\Setting::where('name','email')->first()->value ?? 'info@laysenvalley.sa' }} ">{{App\Models\Setting::where('name','email')->first()->value ?? 'info@laysenvalley.sa' }} </a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-3 block text-start text-sm-end  " data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <h2 class="text-uppercase">
                    {{trans('file.stay_connected')}}
                </h2>

                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{App\Models\Setting::where('name','twitter')->first()->value }}"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="{{App\Models\Setting::where('name','instagram')->first()->value }}"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="{{App\Models\Setting::where('name','facebook')->first()->value }}"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="{{App\Models\Setting::where('name','linkedin')->first()->value }}"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="{{App\Models\Setting::where('name','pinterest')->first()->value }}"><i class="fa-brands fa-pinterest" aria-hidden="true"></i></a></li>
                    <li class="list-inline-item"><a href="{{App\Models\Setting::where('name','youtube')->first()->value }}"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a></li>

                </ul>
            </div>


        </div>
        

        <div class="footer-copyright text-white pt-1">
            <div class="row pb-5">
                <div class="col-12 col-sm-6 offset-sm-3 text-center   " data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="2000">

                    <a class="navbar-brand text-uppercase" href="#">
                        {{trans('file.owned_by')}}
                        <img src="{{asset('assets/images/footer.png')}}" alt="" width="97" height="105" class="d-inline-block align-text-bottom">
                        
                      </a>
                                      </div>
                <div class="col-12 col-sm-3 d-flex align-items-end    " data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    
                    <ul class="list-unstyled text-start text-sm-end mt-2">

                        <li class="">
                            <a class="text-uppercase"  href="{{url('/pages/privacy-policy')}}">
                                {{trans('file.privacy_policy')}}
                            </a>
                        </li>
                        <li class="">
                            <a class="text-uppercase" href="{{url('/pages/trems-of-use')}}" >
                                {{trans('file.trems_of_use')}}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


    </div>
</section>
