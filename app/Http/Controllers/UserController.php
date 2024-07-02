<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return UserResource::collection($users);
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'message' => 'User berhasil dibuat',
            'user' => new UserResource($user)
        ], 201);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'email' => 'email|max:255|unique:users,email,',
            'username' => 'max:255|unique:users,username,',
            'password' => 'min:8',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'User berhasil diperbarui',
            'user' => new UserResource($user)
        ]);
    }
    
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        
        return response()->json([
            'message' => 'User berhasil dihapus'
        ], 204);
    }
}
