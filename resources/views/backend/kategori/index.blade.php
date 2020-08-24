@extends('layouts.master')

@section('title')
	<title>Kategori Barang</title>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title"><i class="fa fa-list text-success"></i> &nbsp; List Kategori Barang</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="row"  style="margin-bottom:20px;">
                    <div class="col-md-12">
                        <a class="btn btn-info btn-md pull-right" href="{{ route('kategori-barang.create') }}">
                            <i class="fa fa-plus-circle"></i>&nbsp;Add New Kategori
                        </a>
                    </div>
                </div>
                <table class="table table-bordered" data-plugin="DataTable">
                    <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $no => $item)
                            <tr>
                                <td width="10" class="text-center">{{ ($no+1) }}</td>
                                <td class="text-left"><b>{{ $item->kategori }}</b></td>
                                <td class="text-left"><b>{!! $item->keterangan !!}</b></td>
                                <td class="text-center">
                                   <a style="cursor: pointer" href="{{ route('kategori-barang.edit',$item->id) }}" class="btn btn-xs btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
									<a style="cursor: pointer" class="btn btn-xs btn-danger btn-delete" data-value="{{ $item->id }}" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></a>
								</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div>
    
@endsection
@section('modal')
	
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Delete Data Confirmation</h4>
				</div>
				<div class="modal-body">
					<h3>Are You Sure to Delete This Data ?</h3>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
					<form id="form-delete" action="#" method="POST" style="display: inline;">
						@csrf
						@method('DELETE')
						<input type="submit" class="btn btn-danger" value="Ya, Saya Yakin">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('footscript')
	<script>

		$('.table').on('click', '.btn-delete', function(){
			let id = $(this).data('value')
			$('#form-delete').attr('action', "{{ url('admin/kategori-barang') }}/" + id)	
        })
	</script>
@endsection