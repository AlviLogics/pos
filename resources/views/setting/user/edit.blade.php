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
  <div class="row">
      <div class="col-12 col-lg-6 mb-5">
          <div class="card mb-4">
              <div class="card-body">
                <h5 class="mb-4">{{ $data['formheading']}}</h5>
          <form method="POST" action="{{ route('users.update',$user->id)}}">
              @csrf
              @method('put')
              
              <div class="form-group position-relative error-l-50">
                      <label>User Name</label>
                      <input id="name" type="text" name="name" value="{{ old('name',$user->name) }}" placeholder="Enter name" class="form-control" required>
                      <div class="invalid-tooltip">
                      User Name is required!
                      </div>
                  </div>
                  <div class="form-group position-relative error-l-50">
                      <label>Email</label>
                      <input id="email" type="text" name="email" value="{{ old('email',$user->email) }}" placeholder="Enter email" class="form-control" required>
                      <div class="invalid-tooltip">
                      User Name is required!
                      </div>
                  </div>

                  <div class="form-group position-relative error-l-50">
                      <label>Password</label>
                      <input id="password" type="text" name="password" value="{{ old('password') }}"
                  placeholder="Enter password" class="form-control" >
                      <div class="invalid-tooltip">
                      Password is required!
                      </div>
                  </div>
                  <div class="form-group position-relative error-l-50">
                      <label>Confirm Password</label>
                      <input id="password_confirmation" type="text" name="password_confirmation" placeholder="Re-enter password" class="form-control" >
                      <div class="invalid-tooltip">
                      Confirm Password is required!
                      </div>
                  </div>
            

            <h3 class="text-xl my-4 text-gray-600">Role</h3>
            <div class="grid grid-cols-3 gap-4">
              @foreach($roles as $role)
                  <div class="flex flex-col justify-cente">
                      <div class="flex flex-col">
                          <label class="inline-flex items-center mt-3">
                              <input type="radio" class="form-radio h-5 w-5 text-blue-600" name="roles[]" value="{{$role->id}}"
                              @if(count($user->roles->where('id',$role->id)))
                                  checked 
                              @endif
                              ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                          </label>
                      </div>
                  </div>
              @endforeach
            </div>
            <div class="form-group position-relative error-l-50">
                <label>Choose Branch</label>
                <select name="branch_id" id="branch_id" class="custom-select form-control" required>    
                        <option value="">Select</option>
                        @if(isset($branches) )
                        @forelse($branches as $branch)
                            <option value="{{$branch->id}}" {{ (old('branch_id',$user->branch_id) == $branch->id ? "selected":"") }}>{{ $branch->name }}</option>
                        @empty    
                        <option value="0">No Record Found</option>
                        @endforelse
                        @endif
                    </select>
                <div class="invalid-tooltip">
                    Brand is required!
                </div>
            </div>
            <div class="text-center mt-16 mb-16">
              <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </main>    
  </div>
</main>
@endsection
