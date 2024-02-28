@extends('admin.layouts.layout')
@section('content')
<main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>{{ $data['firstheading']}}</h1>
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb pt-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Library</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 data-tables-hide-filter">
                    <div class="card">
                        <div class="card-body">

                            <table class="data-table data-tables-pagination responsive"
                                data-order="[[ 1, &quot;desc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @can('Role access')
                                @forelse($roles as $role)
                                    <tr>
                                        <td>
                                            <p class="list-item-heading">{{$role->name}}</p>
                                        </td>
                                        <td>
                                          @foreach($role->permissions as $permission)
                                            {{ $permission->name }} ,
                                          @endforeach
                                          </span>
                                        </td>
                                        
                                        <td>
                                          @can('Role edit')
                                          <a href="{{route('roles.edit',$role->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                                          @endcan

                                          @can('Role delete')
                                          <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                              @csrf
                                              @method('delete')
                                              <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                                          </form>
                                          @endcan
                                        </td>
                                       
                                    </tr>
                                    @empty
                                    <tr>
                                        <td >
                                            <p class="list-item-heading">No Record Found</p>
                                        </td>
                                        <td>
                                            <p class="text-muted"></p>
                                        </td>
                                        <td>
                                            <p class="text-muted"></p>
                                        </td>
                                    </tr>
                                    @endforelse
                                    @endcan
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
