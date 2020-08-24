@extends('layouts.frontend')

@section('title')
    Detail Barang
@endsection

@section('content')
    <div class="content">
         <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg par-elem " data-bg="{{ asset('theme/assets/images/landing-page/header-bg.jpg') }}" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;{{ asset('theme/assets/images/landing-page/header-bg.jpg') }}&quot;); transform: translateZ(0px) translateY(-3.52423%);"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title center-align">
                    <h2><span>Detail Data Barang</span></h2>
                    <div class="breadcrumbs fl-wrap"><a href="{{ url('/') }}">Beranda</a><span>Detail Barang</span></div>
                    <span class="section-separator"></span>
                </div>
            </div>
        </section>
        <section class="gray-section" id="sec1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                        <!-- article> --> 
                                        <article>
                                            @if ($get)
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="list-single-main-media fl-wrap">
                                                        <div class="single-slider-wrapper fl-wrap">
                                                            <div class="single-slider fl-wrap"  >
                                                                <div class="slick-slide-item">
                                                                    <img src="{{ url('images/'.$get->foto) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="list-single-main-item fl-wrap text-left">
                                                        <div class="list-single-main-item-title fl-wrap text-left">
                                                            <u>Kode Barang</u> : <b>{{ $get->kode_barang }}</b>
                                                        </div>
                                                        <div class="list-single-main-item-title fl-wrap text-left">
                                                            <u>Kategori Barang</u> : <b>{{ isset($get->kategori->kategori) ? $get->kategori->kategori : '' }}</b>
                                                            <h3>Nama Barang : {{ $get->nama_barang }}</h3>
                                                        </div>
                                                        <u>Keterangan</u> : <b><br><br></b>
                                                        {!! $get->keterangan !!}
                                                        <span class="fw-separator"></span>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                                
                                            
                                            @else
                                                <div class="list-single-main-item fl-wrap text-center" style="text-align: center !important;">
                                                    <div class="list-single-main-item-title fl-wrap text-center" style="text-align: center !important;">
                                                        <h3 style="text-align: center !important;">Data Tidak Ditemukan</h3>
                                                    </div>
                                                    <span class="fw-separator"></span>
                                                </div>
                                            @endif
                                        </article>
                                        <!-- article end -->       
                                        <span class="section-separator"></span>
                                                                  
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </section>
    </div>
@endsection

@section('csslink')
        <style>
        section.parallax-section {
            padding: 150px 0 0px 0px !important;
        }   
    </style>
@endsection

@section('script')

@endsection