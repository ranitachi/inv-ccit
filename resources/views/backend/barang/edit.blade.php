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
                                    <label>Foto Barang <span class="text-danger">(*)</span></label>
                                    <input type="file" class="form-control" name="foto"  id="foto" accept=".jpg,.png,.jpeg">
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="kode_barang"  id="kode_barang" required data-parsley-error-message="Kode Barang is Required" value="{{ $get->kode_barang }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="nama_barang"  id="nama_barang" required data-parsley-error-message="Nama Barang is Required" value="{{ $get->nama_barang }}">
                                </div>
                                <div class="form-group">
                                    <label>Kategori <span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="kategori_id"  id="kategori_id" required data-parsley-error-message="Kategori Barang is Required">
                                        <option></option>
                                        @foreach ($kategori as $item)
                                            @if ($item->id==$get->kategori_id)
                                                <option value="{{ $item->id }}" selected="selected">{{ $item->kategori }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan <span class="text-danger">(*)</span></label>
                                    <textarea class="form-control summernote" name="comment"  id="comment" required data-parsley-error-message="Keterangan Barang is Required">{{ $get->keterangan }}</textarea>
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