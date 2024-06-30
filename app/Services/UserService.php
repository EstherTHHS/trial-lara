<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userInterface;

    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function getUsers(Request $request)
    {
        return $this->userInterface->getUsers($request);
    }

    public function getUserById($id)
    {
        return $this->userInterface->getUserById($id);
    }

    public function storeUser($data)
    {
        $user = User::create($data);
        $role = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($role->user);
        return $user;
    }

    public function updateUserById($data, int $id)
    {
        $startTime = microtime(true);

        $user = User::find($id);

        if (!$user) {
            return response()->error(request(), null, 'User not found', 404, $startTime);
        }



        $user->update($data);

        return response()->success(request(), $user, 'User Updated Successfully.', 200, $startTime, 1);
    }

    public function deleteUserById(int $id)
    {
        $startTime = microtime(true);

        $user = User::find($id);

        if (!$user) {
            return response()->error(request(), null, 'User not found', 404, $startTime);
        }

        $user->delete();

        return response()->success(request(), $user, 'User Deleted Successfully.', 200, $startTime, 1);
    }

    public function getRoleName()
    {
        return $this->userInterface->getRoleName();
    }
}
