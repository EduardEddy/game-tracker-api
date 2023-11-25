<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use App\Notifications\RegisterUserNotification;

use App\Services\User\UserService;
use App\Services\Park\ParkService;

class UserController extends Controller
{
    protected $userService;
    protected $parkService;
    public function __construct()
    {
        $this->userService = new UserService();
        $this->parkService = new ParkService();
    }
    
    public function store(RegisterRequest $request) 
    {
        $user = $this->userService->create($request->validated());
        $this->parkService->create($user, $request->park_name);
        
        \Notification::send($user, new RegisterUserNotification($user));
        return view('active_account.index', ['user_id'=>$user->id]);
    }
}
