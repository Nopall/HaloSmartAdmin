<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function deleteUserById(string $id): void
    {
        DB::transaction(function () use ($id) {
            $user = User::where('id', $id)->first();
            $user->update(['is_deleted' => 1]);
        });
    }
}
