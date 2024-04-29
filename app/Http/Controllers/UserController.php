<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('forbidden');
        }

        $users = User::all();
        return view('admin.akun', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahakun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'name' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Data user berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $user = User::findOrFail($id);

        return view('admin.editakun', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'username' => 'required|unique:users,username,'.$id,
            'name' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $user = User::findOrFail($id);

        $user->posts()->delete();

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data user dan post terkait berhasil dihapus.');
    }
}
