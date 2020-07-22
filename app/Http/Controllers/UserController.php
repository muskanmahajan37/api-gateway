<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


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
        $userToUpdate = $user;
        $userToUpdate->name = empty($request->name) ? $user->name : $request->name;;
        $userToUpdate->username = empty($request->username) ? $user->username : $request->username;
        $userToUpdate->email = empty($request->email) ? $user->email : $request->email;
        $password = null;
        if ($request['password']) {
            $password = Hash::make($request->password);
            $userToUpdate->password = $password;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileToStore =$image->getClientOriginalName();
            $image->move(base_path('public/user'), $fileToStore);
        } else {
            $fileToStore = 'noimage.jpg';
        }
        $userToUpdate->image=$fileToStore;
        $userToUpdate->update();
        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ], 201);
    }
}
