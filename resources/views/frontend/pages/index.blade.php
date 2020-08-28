@extends('layouts.frontend')

@section('title')
    Data Barang
@endsection

@section('content')
    <div class="content">
         <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg par-elem " data-bg="{{ asset('theme/assets/images/landing-page/header-bg.jpg') }}" data-scrollax="properties: { translateY: '30%' }" style="background-image: url(&quot;{{ asset('theme/assets/images/landing-page/header-bg.jpg') }}&quot;); transform: translateZ(0px) translateY(-3.52423%);"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title center-align">
                    <h2><span>Data Barang</span></h2>
                    <div class="breadcrumbs fl-wrap"><a href="{{ url('/') }}">Beranda</a><span>Data Barang</span></div>
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
                                           
                                            <table class="table table-bordered" data-plugin="DataTable">
                                                <thead>
                                                    <tr>
                                                        <th width="10">#</th>
                                                        <th>Foto</th>
                                                        <th>Kategori Barang</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($databarang as $no => $item)
                                                        <tr>
                                                            <td width="10" class="text-center">{{ ($no+1) }}</td>
                                                            <td class="text-center">
                                                                <img src="{{ url('images/'.$item->foto) }}" style="height:100px;">
                                                            </td>
                                                            <td class="text-left"><b>{{ $item->kategori->kategori }}</b></td>
                                                            <td class="text-left"><b>{{ $item->kode_barang }}</b></td>
                                                            <td class="text-left"><b>{{ $item->nama_barang }}</b></td>
                                                            <td class="text-center">
                                                                <a style="cursor: pointer" href="{{ url('detail-barang/'.$item->kode_barang) }}" class="btn btn-xs btn-info" data-toggle="tooltip" title="Barang Detail"><i class="fa fa-eye"></i> Detail&nbsp;&nbsp;&nbsp;</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                                
                                        </article>
                                        <!-- article end -->       
                                        <span class="section-separator"></span>
                                                                  
                                    </div>
                                </div>
                                <div class="row"  style="margin-bottom:20px;">
                                    <div class="col-md-12 text-right">
                                       {{ $databarang->links() }}
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