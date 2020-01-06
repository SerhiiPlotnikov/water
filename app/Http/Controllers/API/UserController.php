<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\User;
use App\Http\Resources\UserCollection;
use App\Http\Response\ApiResponse;
use App\Services\UserService;

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
        return ApiResponse::success(new UserCollection($users->getCollection()));
    }


    public function show($id)
    {
        try {
            $user = $this->userService->getUser($id);
            return ApiResponse::success(new User($user));
        } catch (UserNotFoundException $exception) {
            return ApiResponse::error($exception);
        }
    }


    public function destroy($id)
    {
        $this->userService->removeUser($id);
        return ApiResponse::emptySuccess();
    }
}
