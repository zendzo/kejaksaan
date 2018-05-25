@extends('layouts.master')

@section('jsPlugins')
<!-- DataTables -->
<script src="{{ asset('js/jquery.highlight.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->
<script>
    $(document).ready( function () {
	    var table = $('#example1').DataTable();
	 
	    table.on( 'draw', function () {
	        var body = $( table.table().body() );
	 
	        body.unhighlight();
	        body.highlight( table.search() );  
	    } );
	} );
</script>

@endsection

@section('cssPlugins')
<style>
	table.dataTable span.highlight {
	  background-color: #FFFF88;
	}
</style>
<!-- DataTables -->
<link rel="stylesheet" href=".{{ asset('AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')

  @include('pengaduan.table_list')
  
@endsection