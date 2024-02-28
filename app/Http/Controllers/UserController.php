<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sideMenu'] = 'usermanagement';

        $data['firstheading'] = 'User Management';
        $data['formheading'] = 'User Information';

        
        if(Auth::user()->hasRole('superadmin'))
        {
            $user= User::latest()->get();
            $brands= Brand::latest()->get();
        }
        if( ( Auth::user()->hasRole('admin') ) || (Auth::user()->hasRole('manager') || (Auth::user()->hasRole('brandadmin') ) ) )
        {
            $user= User::latest()->get();
        }

        return view('setting.user.index',['users'=>$user, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('setting.user.new',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
        $user->syncRoles($request->roles);
        return redirect()->back()->withSuccess('User created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['sideMenu'] = 'usermanagement';

        $data['firstheading'] = 'User Management';
        $data['formheading'] = 'User Information';

        $role = Role::get();
        $user->roles;

       return view('setting.user.edit',['user'=>$user,'roles' => $role, 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
        ]);

        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed',
                'branch_id' => 'required'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

            $request->validate([
                'branch_id' => 'required'
            ]);

        //dd($request->all());
        //$validated['branch_id'] = $request->branch_id;
        $user->branch_id = $request->branch_id;
        //dd($validated);
        //$user->update($validated);
        $user->update();

        $user->syncRoles($request->roles);
        return redirect()->back()->withSuccess('User updated !!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->withSuccess('Role deleted !!!');
    }
}