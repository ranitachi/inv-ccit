@extends('layouts.frontend')

@section('title')
    Beranda
@endsection

@section('slider')
    @include('frontend.includes.slider')
@endsection
@section('content')
    <div class="content">
                    <section class="gray-section">
                        <div class="container">
                            <div class="section-title">
                                <h2>Training Information</h2>
                                <div class="section-subtitle">JICA</div>
                                <span class="section-separator"></span>
                                <p>Training Information</p>
                            </div>
                        </div>
                        <!-- carousel -->
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel fl-wrap ">
                                <!--slick-slide-item-->
                                @foreach ($skema as $item)
                                    
                                    <div class="slick-slide-item">
                                        <!-- listing-item -->
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img w-200px">
                                                    <img src="{{ URL::asset($item->logo) }}" alt="" class="hg-100p w-auto m-auto f-unset">
                                                    <div class="overlay"></div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <a class="listing-geodir-category">Skema</a>
                                                    
                                                    <h3><a href="{{ url('skema/'.$item->jenis_slug) }}">{{ $item->jenis_skema }}</a></h3>
                                                    <p>{{ strip_tags($item->keterangan) }}</p>
                                                    <div class="geodir-category-options fl-wrap">
                                                        <a href="{{ url('skema/'.$item->jenis_slug) }}" class="btn color-bg flat-btn pull-right">Detail</a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <!-- listing-item end-->
                                    </div>
                                @endforeach
                                <!--slick-slide-item end-->
                               
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <h2>News</h2>
                                <div class="section-subtitle">News.</div>
                                <span class="section-separator"></span>
                                <p>News.</p>
                            </div>
                            <div class="row home-posts">
                                @php
                                    $idx=0;
                                @endphp
                                @foreach ($berita as $x=>$item)
                                    @if ($item['judul_berita'])
                                        
                                    
                                        @if($idx==8)
                                            @php
                                                break;
                                            @endphp
                                        @endif
                                        <div class="col-md-3 mb-20">
                                            <article class="card-post">
                                                <div class="card-post-img fl-wrap">
                                                    @if ($item['url_foto'])
                                                        <a href="{{ url('berita/'.Illuminate\Support\Str::Slug($item['judul_berita'])) }}">
                                                            <img src="https://tangerangkab.go.id/images/{{ $item['url_foto'] }}"   alt="{{ $item['judul_berita'] }}">
                                                        </a>
                                                    @else
                                                        <div class="img-post-c"></div>
                                                    @endif
                                                </div>
                                                <div class="card-post-content fl-wrap hg-350">
                                                    <h3><a href="{{ url('berita/'.Illuminate\Support\Str::Slug($item['judul_berita'])) }}">{{ potongjudul($item['judul_berita'],10) }}</a></h3>
                                                    <p>{{ substr(str_replace('&nbsp;',' ',strip_tags($item['isi_berita'])),0,130) }} ... </p>
                                                    <div class="post-opt p-abs bottom-1">
                                                        <ul>
                                                            <li><i class="fa fa-calendar-check-o"></i> <span>{{ date('d F Y',strtotime($item['tanggal_publish'])) }}</span></li>
                                                            <li><i class="fa fa-eye"></i> <span>{{ $item['view_counter'] }}</span></li>
                                                            {{-- <li><i class="fa fa-tags"></i> <a href="#">{{ $item['tags'] }}</a>  </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        @php
                                            $idx++;
                                        @endphp
                                    @endif
                                @endforeach
                                
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    
                    <!--section -->
                    <section class="gradient-bg">
                        <div class="cirle-bg">
                            <div class="bg" data-bg="{{ asset('backend') }}/images/bg/circle.png"></div>
                        </div>
                        <div class="container">
                            <div class="join-wrap fl-wrap">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3>Have some question ? ?</h3>
                                    </div>
                                    <div class="col-md-4"><a href="{{ url('faq') }}" class="join-wrap-btn">Klik FAQ <i class="fa fa-question"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
@endsection

@section('modal')
     <div class="main-register-wrap modal">
                <div class="main-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg"><i class="fa fa-times"></i></div>
                        <h3>Sign In <span>City<strong>Book</strong></span></h3>
                        <div class="soc-log fl-wrap">
                            <p>For faster login or register use your social account.</p>
                            <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                            <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                        </div>
                        <div class="log-separator fl-wrap"><span>or</span></div>
                        <div id="tabs-container">
                            <ul class="tabs-menu">
                                <li class="current"><a href="#tab-1">Login</a></li>
                                <li><a href="#tab-2">Register</a></li>
                            </ul>
                            <div class="tab">
                                <div id="tab-1" class="tab-content">
                                    <div class="custom-form">
                                        <form method="post"  name="registerform">
                                            <label>Username or Email Address * </label>
                                            <input name="email" type="text"   onClick="this.select()" value=""> 
                                            <label >Password * </label>
                                            <input name="password" type="password"   onClick="this.select()" value="" > 
                                            <button type="submit"  class="log-submit-btn"><span>Log In</span></button> 
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <div class="custom-form">
                                            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                <label >First Name * </label>
                                                <input name="name" type="text"   onClick="this.select()" value=""> 
                                                <label>Second Name *</label>
                                                <input name="name2" type="text"  onClick="this.select()" value="">
                                                <label>Email Address *</label>
                                                <input name="email" type="text"  onClick="this.select()" value="">                                              
                                                <label >Password *</label>
                                                <input name="password" type="password"   onClick="this.select()" value="" > 
                                                <button type="submit"     class="log-submit-btn"  ><span>Register</span></button> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('csslink')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"/>
@endsection

@section('script')
    {{-- <script src="{{ asset('js/Chart.min.js') }}"></script> --}}
    {{-- @include('frontend.pages.chart-data') --}}
@endsection