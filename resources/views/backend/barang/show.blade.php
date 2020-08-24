@extends('layouts.master')

@section('title')
	<title>Data Barang Form | Data Barang</title>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title"><i class="fa fa-list text-success"></i> &nbsp; Data Barang Form</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="row"  style="margin-bottom:20px;">
                    <div class="col-md-12">
                        <a class="btn btn-info btn-md pull-right" href="{{ route('data-barang.index') }}">
                            <i class="fa fa-chevron-left"></i>&nbsp;Back To List
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('data-barang.update',$id) }}" method="POST" id="form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-md-8">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label>Kode Barang <span class="text-danger">(*)</span></label>
                                    <input style="border:0px !important;background:#fff !important;font-weight:bold" readonly type="text" class="form-control" name="kode_barang"  id="kode_barang" required data-parsley-error-message="Kode Barang is Required" value="{{ $get->kode_barang }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang <span class="text-danger">(*)</span></label>
                                    <input style="border:0px !important;background:#fff !important;font-weight:bold" readonly type="text" class="form-control" name="nama_barang"  id="nama_barang" required data-parsley-error-message="Nama Barang is Required" value="{{ $get->nama_barang }}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Keterangan <span class="text-danger">(*)</span></label>
                                    <div style="margin-left:15px;">{!! $get->keterangan !!}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if ($get->foto)
                                    <img src="{{ url('images/'.$get->foto) }}" style="width:100%;">
                                @endif
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
                
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
    
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap-tagsinput.css">
    <link href="{{ asset('css') }}/summernote.css" rel="stylesheet">
@endsection
@section('footscript')
    <script type="text/javascript" src="{{ asset('js') }}/parsley.min.js"></script>  
    <script type="text/javascript" src="{{ asset('js') }}/bootstrap-tagsinput.js"></script>  
    <script type="text/javascript" src="{{ asset('js') }}/summernote.js"></script>
    <script>
        
        $(document).ready( function () {
           $('#form').parsley();

            $('.summernote').summernote({
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            
        } );
    </script>
    <style>
        .parsley-custom-error-message,
        .parsley-required{
            color : red;
        }
    </style>
@endsection