<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(
            $users,
            201);
    }

    public function show(User $user)
    {
        return response()->json(
            $user,
            201);
    }

    public function getUserByUsername($username)
    {
        $user = User::where('username', $username)->get()->first();
        if (!$user) {
            return response()->json([
                'message' => 'User cannot be found'], 404);
        }
        return response()->json(
            $user, 200
        );
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Successfully deleted user!'], 201);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $password = null;
        if ($request['password']) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->update();
        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ], 201);
    }
}
