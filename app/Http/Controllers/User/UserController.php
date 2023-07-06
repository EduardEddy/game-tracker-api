<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use App\Traits\ParkTrait;
use App\Notifications\RegisterUserNotification;

class UserController extends Controller
{
    use ParkTrait;
    public function store(RegisterRequest $request) 
    {
        $user = User::create($request->validated());
        $this->storePark($request->park_name, $user);
        \Notification::send($user, new RegisterUserNotification($user));
        return view('active_account.index', ['user_id'=>$user->id]);
    }
}
