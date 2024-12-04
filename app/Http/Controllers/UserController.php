<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function index()
    {
        return response()->json($this->userService->all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        return response()->json($this->userService->create($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->userService->find($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8',
        ]);

        return response()->json($this->userService->update($data, $id));
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}