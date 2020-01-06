<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->allUsers();
        return view('user.index', ['users' => $users->getCollection()]);
    }


    public function store(Request $request)
    {
        $user = $this->userService->createUser(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('age'),
            $request->get('weight'));
        return response()->json(['user' => $user]);
    }

    public function show(int $id)
    {
        $user = $this->userService->getUser($id);
        return view('user.show', ['user' => collect([$user])]);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->editUser(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('age'),
            $request->get('weight'),
            $id);
        return response()->json(['user' => $user]);
    }

    public function destroy($id)
    {
        $this->userService->removeUser($id);
    }
}
