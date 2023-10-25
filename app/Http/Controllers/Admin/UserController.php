<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.list');
    }

    public function deleteUserById(String $id)
    {
        $this->userService->deleteUserById($id);

        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully.',
        ]);
    }
}
