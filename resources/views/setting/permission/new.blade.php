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

            <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">{{ $data['formheading']}}</h5>
                            
                            <form action="@if (isset($permission)) {{ route('permissions.update', $permission) }} @else {{ route('permissions.store') }} @endif" method="post" accept-charset="utf-8"
                            class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            @if (isset($permission))
                                @method('PUT')
                            @endif
                        
                            @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            </div>
                            @endif
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                            {{session('message')}}
                            </div>
                            @endif  
                               
                                <div class="form-group position-relative error-l-50">
                                    <label>Permission Name</label>
                                    
                                    <input
                                      id="name"
                                      type="text"
                                      name="name"
                                      value="{{ old('name') }}"
                                      placeholder="Enter permission"
                                      class="form-control"
                                      require
                                    />
                                    <div class="invalid-tooltip">
                                    Permission Name is required!
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                

                
            </div>
        </div>
    </main>
                    
@endsection
