<div class="content full-height fs-slider-wrap">
                <!--section -->
                <section class="hero-section no-dadding full-height"  id="sec1">
                    <div class="slider-container-wrap full-height fs-slider fl-wrap">
                        <div class="slider-container">
                            <!-- slideshow-item -->	
                            @php
                                $slider=\App\Models\Slider::where('publish',1)->orderBy('created_at')->limit(3)->get();
                            @endphp
                            @foreach ($slider as $item)
                                <div class="slider-item fl-wrap">
                                    {{-- <div class="bg"  data-bg="{{ asset('backend') }}/images/bg/1.jpg"></div> --}}
                                    <div class="bg bg-slider"  data-bg="{{ Storage::url('slider/'.$item->gambar) }}"></div>
                                    {{-- <div class="bg"  data-bg="{{ Storage::url('public/slider/'.$item->gambar) }}"></div> --}}
                                    <div class="overlay"></div>
                                    <div class="hero-section-wrap fl-wrap">
                                        <div class="container">
                                            <div class="intro-item fl-wrap">
                                                {{-- <h2 style="margin-top:0px;font-size:30px;">{{ $item->judul }}</h2> --}}
                                                {{-- <h3 style="font-size:20px;margin-top:80px">Cari Data Dengan Memasukan Nomor NIK / Nomor KK</h3> --}}
                                            </div>
                                            {{-- <div class="main-search-input-wrap" style="">
                                                <form action="{{ url('cari-data') }}" method="POST">
                                                    @csrf
                                                    <div class="main-search-input fl-wrap">
                                                        <div class="main-search-input-item" style="text-align: center;width:100%">
                                                            <input style="text-align: center;" type="text" placeholder="Masukan NIK / Nomor KK" minlength="16" maxlength="16" required oninvalid="this.setCustomValidity('NIK / Nomor KK Belum Diisi')"/>
                                                        </div>
                                                        <button class="main-search-button" type="submit">Cari Data</button>
                                                    </div>
                                                </form>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        {{-- <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                        <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div> --}}
                    </div>
                </section>
                <!-- section end -->
            </div>