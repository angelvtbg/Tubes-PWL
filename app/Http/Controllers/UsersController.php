<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\User; // Pastikan Anda sudah memiliki model User
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('dashboard.pengguna.index', compact('users')); // Mengembalikan ke view dengan data users
    }

    public function store(Request $request)
    {
        // Validasi input di sini

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('pengguna.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pengguna.index');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pengguna.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:user,admin,chef',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->role = $request->input('role');
        
        // Save the changes to the database
        $user->save();

        // Redirect back with a success message
        return redirect()->route('pengguna.index')->with('success', 'User updated successfully.');
    }
    public function create()
    {
        return view('dashboard.pengguna.create');
    }   
}
