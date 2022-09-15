<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getUserName(Request $request) {
        $users = User::getUsers();
        $token = $request->header('authorization');
        $token = substr($token, 7);

        foreach ($users as $user) {
            if($user['token'] === $token) {
                return $user['name'];
            }
        }
        return response('User not found', 404);
    }

}
