<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    function index()
    {
        $users = DB::table('account')->get();
        return view('users.akun', ['users' => $users]);
    }

    function add_user()
    {
        $this->authorize('admin');
        return view('users/add_user');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $request->validate([
            'username' => 'required|unique:account|max:45',
            'password' => 'required|min:6',
            'name' => 'required|max:45',
            'role' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('akun')->with('success', 'akun created successfully.');
    }

    public function edit_user($username)
    {
        $this->authorize('admin');
        $akun = User::where('username', $username)->firstOrFail();
        return view('users.edit', compact('akun'));
    }

    public function update(Request $request, $username)
    {
        $this->authorize('admin');
        $request->validate([
            'password' => 'sometimes|min:6',
            'name' => 'required|max:45',
            'role' => 'required',
        ]);

        $akun = User::findOrFail($username);

        $akun->update([
            'password' => $request->password ? bcrypt($request->password) : $akun->password,
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('akun')->with('success', 'akun updated successfully.');
    }

    public function destroy($username)
    {
        $this->authorize('admin');
        $akun = User::findOrFail($username);
        $akun->delete();

        return redirect()->route('akun')->with('success', 'akun deleted successfully.');
    }
}
