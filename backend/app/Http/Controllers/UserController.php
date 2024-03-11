<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use JWTAuth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return response()->json(['users' => $users]);
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->createUser($data);

        $access_token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'access_token'), 201);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user = $this->userService->updateUser($user, $data);

        $access_token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'access_token'));
    }

    public function destroy($id)
    {
        $user = $this->userService->getUserById($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $this->userService->deleteUser($user);

        return response()->json(['message' => 'User deleted successfully']);
    }
}
