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

                        <table class="data-table data-tables-pagination responsive nowrap"
                            data-order="[[ 3, &quot;desc&quot; ]]">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td><p class="list-item-heading">{{$user->name}}</p></td>
                                    <td><p class="list-item-heading">{{$user->email}}</p></td>
                                    <td><p class="list-item-heading">
                                        @forelse($user->roles as $role)
                                            {{ $role->name }}
                                        @empty
                                        <a href="{{ route('users.edit', $user->id) }}">AssignRole</a>
                                        @endforelse
                                        </p>
                                    </td>
                                    <td>
                                        <p class="list-item-heading">{{$user->created_at}}</p>
                                    </td>
                                    <td>
                                    @can('User edit')
                                    <a href="{{ route('users.edit', $user->id) }}">Edit |</a>
                                    @endcan
                                    @can('User delete')
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
