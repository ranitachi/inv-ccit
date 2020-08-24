@extends('layouts.master')

@section('title')
	<title>Data Kategori Form | Data Barang</title>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title"><i class="fa fa-list text-success"></i> &nbsp; Data Kategori Form</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="row"  style="margin-bottom:20px;">
                    <div class="col-md-12">
                        <a class="btn btn-info btn-md pull-right" href="{{ route('kategori-barang.index') }}">
                            <i class="fa fa-chevron-left"></i>&nbsp;Back To List
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('kategori-barang.store') }}" method="POST" id="form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-md-12">
                                @csrf
                               
                                <div class="form-group">
                                    <label>Kategori <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="kategori"  id="kategori" required data-parsley-error-message="Kategori Barang is Required">
                                </div>
                              
                                <div class="form-group">
                                    <label>Keterangan </label>
                                    <textarea class="form-control summernote" name="keterangan"  id="keterangan" ></textarea>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Data</button>
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