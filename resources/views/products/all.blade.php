@extends('admin.layouts.layout')
@section('content')
<main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>{{ $data['firstheading']}}</h1>
                    
                    <div class="separator mb-5"></div>
                </div>
            </div>
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
                                        <th>Brand Name</th>
                                        <th>Colors</th>
                                        <!-- <th>Outline</th>
                                        <th>Main Menu</th>
                                        <th>Button</th>
                                        <th>Button Hover</th> -->
                                        <th>Logo1</th>
                                        <th>Logo2</th>
                                        <th>Background</th>
                                        <th>Background</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse($brands as $brand)
                                    <tr>
                                        <td style="vertical-align: middle;" ><p class="list-item-heading ">{{$brand->name}}</p></td>
                                        <td style="vertical-align: middle;">
                                            <p class="list-item-heading">Brand: #{{$brand->brand_color}}<span style="color: #{{$brand->brand_color}}">■</span></p>
                                            <p class="list-item-heading">Outline:#{{$brand->outline_color}}<span style="color: #{{$brand->outline_color}}">■</span></p>
                                            <p class="list-item-heading">Main Menu: #{{$brand->mainmenu_color}}<span style="color: #{{$brand->mainmenu_color}}">■</span></p>
                                            <p class="list-item-heading">Button: #{{$brand->button_color}}<span style="color: #{{$brand->button_color}}">■</span></p>
                                            <p class="list-item-heading">Button Hover: #{{$brand->buttonhover_color}}<span style="color: #{{$brand->buttonhover_color}}">■</span></p>
                                        </td>
                                        <!-- <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td> -->
                                        <td style="vertical-align: middle;">
                                            <p class="text-muted"><img src="{{ asset('img/brands/'.$brand->logo1)}}" alt="Logo 1"
                                        class="img-thumbnail list-thumbnail xsmall" /></p>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <p class="text-muted"><img src="{{ asset('img/brands/'.$brand->logo2)}}" alt="Logo 2"
                                        class="img-thumbnail list-thumbnail xsmall" /></p>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <p class="text-muted"><img src="{{ asset('img/brands/'.$brand->background1)}}" alt="Background 1"
                                        class="img-thumbnail list-thumbnail xsmall" /></p>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <p class="text-muted"><img src="{{ asset('img/brands/'.$brand->background2)}}" alt="Background 2"
                                        class="img-thumbnail list-thumbnail xsmall" /></p>
                                        </td>
                                        
                                        <td style="vertical-align: middle;">
                                            <h3 class="mb-0"><a href="{{ route('brand.show', $brand->id) }}"><i class="simple-icon-eye"></i></a></h3>
                                            @can('Brand edit')
                                            <a href="{{ route('brand.edit', $brand->id) }}">
                                            <button class="btn btn-secondary btn-xs mb-1" >Edit</button>
                                            </a> 
                                            @endcan
                                            @can('Brand delete')
                                            <form id="delete-brand-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" class="inline">
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
                                        <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td>
                                        <!-- <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td>
                                        <td><p class="text-muted"></p></td> -->
                                        
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
                document.getElementById('delete-brand-' + id).submit();
            }
        }

        
    </script>
@endsection