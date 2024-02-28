@extends('admin.layouts.layout')
@section('content')
<main>
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Products</h1>                     
                    <div class="separator mb-5"></div>
                </div>
            </div>
    <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
            <!--========= Table ==========-->
            <div class="row mb-4">
                <div class="col-12 data-tables-hide-filter">
                    <div class="card">
                        <div class="card-body">
                            <!-- 
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn  btn-primary">Excel</button>
                                        <button type="button" class="btn  btn-primary">PDF</button>
                                    </div>
                                </div> 
                                <div class="col-8 d-flex justify-content-end">
                                    <input type="text" placeholder="Search" class="rounded-pill px-3">
                                </div>
                            </div>-->
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse($products as $product)
                                    <tr>
                                    <td style="vertical-align: middle;" ><p class="list-item-heading ">{{$product->id}}</p></td>
                                    <td style="vertical-align: middle;" ><p class="list-item-heading ">{{$product->name}}</p></td>
                                        <td style="vertical-align: middle;">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-xs mb-1">View<i class="simple-icon-eye"></i></a>
                                            @can('Product edit')
                                            <a href="{{ route('products.edit', $product->id) }}">
                                            <button class="btn btn-warning btn-xs mb-1" >Edit</button>
                                            </a> 
                                            @endcan
                                            @can('Product delete')
                                            <form id="delete-product-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-xs mb-1" >Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td ><p class="list-item-heading">No Record Found</p></td>
                                        <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td>                                        
                                    </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>    
@endsection
        
@section('chart-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
@endsection

@section('scripts')
    <script type="text/javascript">
        function confirmdelete(id) {
            let choice = confirm('Are you sure you want to delete')
            if (choice) {
                document.getElementById('delete-product-' + id).submit();
            }
        }

        
    </script>
@endsection