<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255',
            'password_confirmation' => 'required|string|same:password',
            /*'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',*/
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario creado',
            'text' => 'El usuario se ha creado  correctamente'
        ]);

        return redirect()->route('admin.users.edit', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles= Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|max:255',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('admin.users.edit', $user);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Usuario actualizado',
            'text' => 'El usuario se ha actualizado correctamente'
        ]);



        return $user->roles->pluck('id')->toArray();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Usuario eliminado',
            'text' => 'El usuario se ha eliminado correctamente'
        ]);

        return redirect()->route('admin.users.index');
    }
}
