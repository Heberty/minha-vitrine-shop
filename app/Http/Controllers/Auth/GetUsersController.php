<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetUsersController extends Controller
{
    public function getUsers(Request $request)
    {
        return $request->users();
    }
}
